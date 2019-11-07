<?php
namespace Base;

class Produto{

    public function getProdutosByFornecedor(){
        $database = new \Connector();
        $db = $database->getDatabaseConnection();
        $result = $db->from('produto')
                    ->where('fornecedor')->is($this->id_fornecedor)
                    ->orderBy('id', 'desc')
                    ->limit(30)
                    ->offset(100)
                    ->select()
                    ->all();
        return $result;
    }

    public function getProdutosOrderedByIrmao(){
        foreach($this->produtos as $key => $produto){
            $produtosNovo[$produto->id] = $produto;
        }
        foreach ($produtosNovo as $key => $produto) {
            if ($produto->id == $produto->id_produto_vinculado){
                $produtos[$produto->id] = $produto;
                $this->id_produto = $produto->id;
                $this->id_produto_vinculado = $produto->id_produto_vinculado;
                $irmaos = $this->getProdutosFromIdIrmao();
                if ($irmaos){
                    foreach ($irmaos as $keyi => $irmao) {
                        $produtos[$irmao->id] = $irmao;
                    }
                }
                unset($irmaos, $irmao);
            }
        }
        return $produtos;
    }
    public function getProdutosFromIdIrmao(){
        $database = new \Connector();
        $db = $database->getDatabaseConnection();
        $result = $db->from('produto')
                    ->where('id_produto_vinculado')->is($this->id_produto_vinculado)
                    ->andWhere('id')->isNot($this->id_produto)
                    ->orderBy('id', 'desc')
                    ->select()
                    ->all();
        return $result;

    }

    public function getProdutoFromId(){
        $database = new \Connector();
        $db = $database->getDatabaseConnection();
        $result = $db->from('produto')
                    ->where('id')->is($this->id_produto)
                    ->orderBy('id', 'desc')
                    ->select()
                    ->all();
        return $result;
    }

    public function getClasseDoProduto(){
        $database = new \Connector();
        $db = $database->getDatabaseConnection();
        if(!$this->id_classe_preco){
            $result = $db->from('classe_margem')
                        ->orderBy('classe_preco', 'asc')
                        ->select()
                        ->all();
            return $result;
        }else{
            $result = $db->from('classe_margem')
                        ->where('id')->is($this->id_classe_preco)
                        ->orderBy('id', 'desc')
                        ->select()
                        ->all();
            return $result[0];
        }

    }

}
 ?>
