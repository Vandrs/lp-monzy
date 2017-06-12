<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CreateLeadService;
use App\Exceptions\ValidationException;
use App\Models\Lead;
use App\Utils\StringUtil;
use App\Enums\EnumProfile;
use Log;
use Datatables;

class LeadController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except('create');
	}

	public function create(Request $request)
	{
		try {
			$leadService = new CreateLeadService();
			$lead = $leadService->create($request->all());
			return response()->json(['msg' => '<strong>'.$lead->name.'</strong> obrigado por manistar seu interesse em fazer parte da Monzy. Em breve entraremos em contato. Aguarde por novidades!'], 200);
		} catch (ValidationException $e) {
			Log::error($e->getMessage());
			Log::error($e->getTraceAsString());
			$errors = $leadService->getValidator()->errors();
			return response()->json($errors->jsonSerialize(), 400);
		} catch (Exception $e) {
			return response()->json(['msg' => 'Ocorreu um erro inesperado'], 400);
		}
	}

	public function dataTables(Request $request) 
	{
		return Datatables::eloquent(Lead::query())
						 ->filter(function($query) use ($request) {
								if (request()->has('name')) {
			                        $query->where('name', 'like', "%{request('name')}%");
			                    }
			                    if (request()->has('email')) {
			                        $query->where('email', 'like', "%{request('email')}%");
			                    }
			                    if (request()->has('favorite')) {
			                        $query->where('favorite', '=', "{request('favorite')}");
			                    }
			                    if (request()->has('dt_ini')) {
			                        $query->where('created_at', '>=', "{request('dt_ini')}");
			                    }
			                    if (request()->has('dt_fim')) {
			                        $query->where('created_at', '<=', "{request('dt_fim')}");
			                    }
						 })
						 ->editColumn('phone', function(Lead $lead) {
						 	if ($lead->phone) {
						 		return StringUtil::mask($lead->phone, "(##)#####-####");
						 	} else {
						 		return null;
						 	}
						 	
						 })
						 ->editColumn('profile', function(Lead $lead) {
						 	return EnumProfile::getLabel($lead->profile);
						 })
						 ->editColumn('created_at', function(Lead $lead) {
						 	return $lead->created_at->format('d/m/Y');
						 })
						 ->make(true);
	}

	public function updateStatus()
	{

	}

	public function delete()
	{

	}
}