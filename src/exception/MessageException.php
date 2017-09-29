<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 29/09/17
 * Time: 01:40
 */


/**
 * Class MessageException
 *
 * Classe responsável por criar mensagens padrão para usar em toda o software
 */
class MessageException extends Exception
{

    /**
     * Mensagem para objeto não encontrado
     *
     * @return string
     */
    public function msgNotFound()
    {
        return "Lamento, resultado nao encontrado!";
    }

    /**
     * Mensagem para objeto criado com sucesso
     *
     * @return string
     */
    public function msgCreatedSuccessful()
    {
        return "Sucesso, objeto inserido com sucesso no banco de dados!";
    }

    /**
     * Mensagem para objeto alterado com sucesso
     *
     * @return string
     */
    public function msgUpdatedSuccessful()
    {
        return "Sucesso, objeto alterado com sucesso no banco de dados!";
    }

    /**
     * Mensagem para objeto deletado com sucesso
     *
     * @return string
     */
    public function msgDeletedSuccessful()
    {
        return "Sucesso, objeto deletado com sucesso no banco de dados!";
    }
}