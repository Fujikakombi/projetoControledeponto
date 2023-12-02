<?php
    switch($_REQUEST["acao"]){
            case 'cadastrar':
                    $nome = $_POST["nome"];
                    $email = $_POST["e_mail"];
                    $senha = $_POST["senha"];
                    $data_nasc = $_POST["data_nasc"];

                    $sql = "insert into tb_users (nome, e_mail, password, data_nasc) values('{$nome}','{$email}','{$senha}','{$data_nasc}')";

                    $res = $connect->query($sql);

                    if($res==true){

                        print "<script>alert('Cadastro com sucesso');</script>";
                        print "<script>location.href='?page=listar';</script>";
                    }else{

                        print "<script>alert('Não foi possível cadastrar');</script>";
                        print "<script>location.href='?page=listar';</script>";
                    }


                break;

            case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasc = $_POST["data_nasc"]; 
            
            $sql = "update tb_users set 
            nome= '{$nome}',
            e_mail='{$email}',
            password='{$senha}',
            data_nasc='{$data_nasc}' 
            where id=".$_REQUEST["id"];
            
            $res = $connect->query($sql);

            if($res==true){

                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{

                print "<script>alert('Não foi possível Editar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            
            break;


            case 'excluir':
                $sql = "delete from tb_users where id=".$_REQUEST["id"]; 

                $res = $connect->query($sql);

            if($res==true){

                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{

                print "<script>alert('Não foi possível Excluir');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
                break;
    }
