<?php

namespace App\Http\Controllers;

use App\Models\Estudantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function getStatusOperacao($codoperacao)
    {
        $statusAnalise = DB::connection('mysql_RBM')->select('SELECT OPEF.ASSINADASAPROVADAS AS OPERACAO_PAGA
                                                                            FROM avcapital_websec.operacoes_financeiro OPEF
                                                                            INNER JOIN avcapital_websec.operacao OPE
                                                                                ON OPEF.CODOPERACAO = OPE.CODOPERACAO
                                                                             WHERE OPE.CODEMPRESA = 5
                                                                             AND OPE.CODOPERACAO = ?', [$codoperacao]);

        /*$statusAnalise = DB::select('SELECT 	OPEF.ASSINADASAPROVADAS 	AS STATUS_ASSINADA,
                                                OPEF.DTHRASSINADASAPROVADAS AS DTHR_ASSINADA,
                                                OPEF.APROVACAO 				AS STATUS_APROVACAO,
                                                OPEF.DTHRAPROVACAO 			AS DTHR_APROVACAO
                                        FROM avcapital_websec.operacoes_financeiro OPEF
                                        INNER JOIN avcapital_websec.operacao OPE
                                            ON OPEF.CODOPERACAO = OPE.CODOPERACAO
                                         WHERE OPE.CODEMPRESA = 5
                                         AND CODOPERACAO = ?', [$codoperacao]);*/

        return response($statusAnalise, 200);
        #return view('user.index', ['users' => $users]);
    }

    public function getAllEstudantes() {
        $estudantes = Estudantes::get()->toJson(JSON_PRETTY_PRINT);
        return response($estudantes, 200);
    }

    public function createEstudante(Request $request) {

        $estudante = new Estudantes();
        $estudante->nome = $request->nome;
        $estudante->curso = $request->curso;
        $estudante->save();

        return response()->json([
            "message" => "Registro de estudante criado"
        ], 201);

    }

    public function getEstudante($id)
    {

        if (Estudantes::where('id', $id)->exists()) {
            $estudante = Estudantes::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($estudante, 200);
        } else {
            return response()->json([
                "message" => "Estudante não encontrado"
            ], 404);
        }
    }

    public function updateEstudante(Request $request, $id) {

            if (Estudantes::where('id', $id)->exists()) {
                $estudante = Estudantes::find($id);
                $estudante->nome = is_null($request->nome) ? $estudante->nome : $request->nome;
                $estudante->curso = is_null($request->curso) ? $estudante->curso : $request->curso;
                $estudante->save();

                return response()->json([
                    "message" => "Registro atualizado"
                ], 200);
            } else {
                return response()->json([
                    "message" => "Estudante não encontrado"
                ], 404);

            }
    }

    public function deleteEstudante ($id) {
            if(Estudantes::where('id', $id)->exists()) {
                $estudante = Estudantes::find($id);
                $estudante->delete();

                return response()->json([
                    "message" => "Registro deletado"
                ], 202);
            } else {
                return response()->json([
                    "message" => "Registro não encontrado"
                ], 404);
            }

    }
}
