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
use DB;

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
			return response()->json(['msg' => '<strong>'.$lead->name.'</strong> obrigado por manifestar seu interesse em fazer parte da Monzy. Em breve entraremos em contato. Aguarde por novidades!'], 200);
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
								if ($request->has('name') && $request->name) {
			                        $query->where('name', 'like', "%".$request->name."%");
			                    }
			                    if ($request->has('profile') && $request->profile) {
			                        $query->where('profile', '=', $request->profile);
			                    }
			                    if ($request->has('dt_ini') && $request->dt_ini) {
			                        $query->where(DB::raw("DATE(created_at)"), '>=', $request->dt_ini);
			                    }
			                    if ($request->has('dt_fim') && $request->dt_fim) {
			                        $query->where(DB::raw("DATE(created_at)"), '<=', $request->dt_fim);
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
						 ->addColumn('actions', function(Lead $lead) { 
						 	return '<a href="#" class="deleteLead" title="Remover" data-id="'.$lead->id.'"><i class="glyphicon glyphicon-trash"></i></a>';
						 })
						 ->rawColumns(['actions'])
						 ->make(true);
	}

	public function delete($id)
	{
		try {
			$lead = Lead::find($id);
			if ($lead) {
				$lead->delete();
				return response()->json(['msg' => 'Removido com sucesso.'], 200);
			} else {
				return response()->json(['msg' => 'Registro não encontrado.'], 404);
			}
		} catch (\Exception $e) {
			return response()->json(['msg' => 'Ocorreu um erro inesperado.'], 500);
		}
		
	}
}