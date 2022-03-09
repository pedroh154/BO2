<?php
namespace App\Http\Controllers;
    use App\Models\Despesa;
    use Dompdf\Dompdf;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class GeradorDespesaController extends Controller
{
    function gerarDespesa(Request $periodo)
    {
        $now = Carbon::now('GMT-3');
        $to = Carbon::now('GMT-3')->subDays($periodo->periodo);
        $despesasList = Despesa::where('user_id', auth()->id())->whereBetween('data', [$to, $now])->get();

        if($periodo->periodo >= 0 && $periodo->periodo < 31){
            $dompdf = new Dompdf();
            
            $now = Carbon::now('GMT-3');
            $to = Carbon::now('GMT-3')->subDays($periodo->periodo);
            $despesasList = Despesa::whereBetween('data', [$to, $now])->get();

            $dompdf->loadHtml('
            <!DOCTYPE html>
            <html>
            <head><link rel="stylesheet" href="invoice.css"></head>
            <body style="padding: 3rem">
                <h1>Invoice</h1>
                Awesome company<br />
                7026 Hunters Creek Dr<br />
            
                <h2 style="margin-top: 3rem">Bill to</h2>
                {{ invoice.customer.name | html.escape }}<br />
                {{ invoice.customer.address | html.escape }}<br />
            
                <div style="margin-top: 3rem">
                    Invoice No: #{{ invoice.id }}<br />
                    Date: #{{ invoice.created_at }}
                </div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
            
                    {{ for order_line in invoice.order_lines }}
                    <tr>
                        <td>{{ order_line.item_code | html.escape }}</td>
                        <td>{{ order_line.description | html.escape }}</td>
                        <td class="text-end">${{ order_line.quantity }}</td>
                        <td class="text-end">${{ order_line.unit_price | math.format "F2" }}</td>
                        <td class="text-end">${{ order_line.total_price | math.format "F2" }}</td>
                    </tr>
                    {{ end }}
            
                    <tfoot>
                        <tr>
                            <td class="text-end" colspan="4"><strong>Total:</strong></td>
                            <td class="text-end">${{ invoice.total_price | math.format "F2" }}</td>
                        </tr>
                    </tfoot>
                </table>
            </body>
            </html>
            ');
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            if($now != $to){
                $dompdf->stream('Despesas '.$to.' '.$now);
            }
            else{
                $dompdf->stream('Despesas '.$now);
            }
            
        }
    }
}
?>

