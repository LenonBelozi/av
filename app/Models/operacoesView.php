<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperacoesView extends Model
{

    protected $connection = 'mysql_RBM';

    protected $table = 'operacao-operacoes_financeiro';

    protected $fillable = ['ASSINADASAPROVADAS', 'DTHRASSINADASAPROVADAS', 'APROVACAO', 'DTHRAPROVACAO'];
}
