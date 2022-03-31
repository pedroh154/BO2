<?php
    namespace App\Http\Controllers;
    use App\Models\Despesa;
    use App\Models\Cte;
    use App\Models\Cliente;
    use App\Models\Cidade;
    use App\Models\User;
    use Dompdf\Dompdf;
    use Dompdf\Options;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class GeradorComprovanteController extends Controller
    {
        function gerarComprovante($id)
        {
            $comprovante_cte = Cte::where('user_id', auth()->id())->where('id', $id)->get()->first();

            if($comprovante_cte->finalizado == 'CONCLUÍDO'){
            //$now = Carbon::now('GMT-3');
            //$to = Carbon::now('GMT-3')->subDays($periodo->periodo);
            //$despesasList = Despesa::where('user_id', auth()->id())->whereBetween('data', [$to, $now])->get();

            // if($periodo->periodo < 366){
                $options = new Options();
                $options->setChroot(__DIR__);
                $dompdf = new Dompdf($options);
                
                $comprovante_rem = Cliente::where('id', $comprovante_cte->remetente_id)->get()->first();
                $comprovante_dest = Cliente::where('id', $comprovante_cte->destinatario_id)->get()->first();
                $comprovante_cidade = Cidade::where('id', $comprovante_cte->cidade_destinataria_id)->get()->first();
                $comprovante_user = User::where('id', $comprovante_cte->user_id)->get()->first();

            //     $now = Carbon::now('GMT-3');
            //     $to = Carbon::now('GMT-3')->subDays($periodo->periodo);
                //$despesasList = Despesa::whereBetween('data', [$to, $now])->get();

                $dompdf->loadHtml('
                <!DOCTYPE html>
                <html>

                <head>
                    <link rel="stylesheet" href="invoice.css">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                        crossorigin="anonymous"></script>
                </head>

                <body style="padding: 3rem">
                    <header>
                        <div class="caixa">
                            <h3>
                                A.P. Sistemas
                            </h3>
                            <br>
                        </div>
                    </header>
                    <h1>Comprovante de entrega</h1> <Br>

                    <h3>Declaramos que a encomenda a seguir foi entregue.</h3>
                    
                    <p><b>Remetente:</b> '. $comprovante_rem->nome .'</p>
                    <p><b>Destinatário:</b> '. $comprovante_dest->nome .'</p>
                    <p><b>Local de entrega:</b> '. $comprovante_dest->endereco .'</p>
                    <p><b>Município:</b> '. $comprovante_cidade->name .'</p>
                    <p><b>Quantidade de volumes:</b> '. $comprovante_cte->volume .'</p>
                    <p><b>Valor do frete:</b> '. $comprovante_cte->valor_cte .'</p>
                    <p><b>Data da entrega:</b> '. $comprovante_dest->data_entrega .'</p>

                    <br>
                    
                    <h3>Assinado: '. $comprovante_user->nome .'</h3>

                    

                </body>

                </html>
                ');

                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream();
                // if($now != $to){
                //     $dompdf->stream('Despesas '.$to.' '.$now);
                // }
                // else{
                //     $dompdf->stream('Despesas '.$now);
                // }
                
            }
        }
    }
?>

