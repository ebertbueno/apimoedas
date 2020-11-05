<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@lang('Relatório')</title>


    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        h1.title {
            font-size: 1.2em!important;
        }
        @page {
            margin: 80px 25px;
            /* margin-left: 2cm; */
            font-size: 0.8em;
        }

        #header {
            position: fixed;
            left: 0px;
            top: -80px;
            right: 0px;
            height: 80px;
            /**background-color: orange; **/
            text-align: center;
            padding-top: 10px;
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -80px;
            right: 0px;
            height: 80px;
            /**background-color: lightblue;**/
            padding: 10px;
        }

        #footer .page:after {
            content: counter(page, upper-roman);
        }

        table {
            font-size: 0.8em;
            width: 100%;
            border-spacing: 0;
        }

        tr {
            margin-bottom: 0px;
        }


        td {
            margin: 3px !important;
        }


        .table {
            margin-bottom: 1.5rem;
        }

        /*this is working great! Yay!*/
        #content .table-striped > tbody>tr:nth-of-type(odd)>td {
            /* background-color: #bfdeff !important; */
            background-color: #EAEDEA !important;

        }

        /*table header color change. This isn't working yet*/
        #content .table-striped  th {
            /* background-color: #216eb7 !important; */
            background-color: #3E4A4E !important;
            color: white;
            padding: 5px;
        }


        #content table {
            width: 100%!important;
        }

        /*trying to avoaid pdf page breask inside table rows. This isn't working yet*/
        #content .table-striped > tbody>tr>td {
            page-break-inside: avoid !important;
            page-break-after: auto !important;
            padding: 5px;
        }

        #content .table-striped > tfoot>tr>td {
            page-break-inside: avoid !important;
            page-break-after: auto !important;
            padding: 5px;
            background-color: #657A81 !important;
            color: white;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .col-md-1 {
            width: 8.3333333%;
        }

        .col-md-2 {
            width: 16.6666667%;
        }

        .col-md-3 {
            width: 24,9999999%;
        }

        .col-md-4 {
            width: 33.3333332%;
        }

        .col-md-5 {
            width: 41.6666665%;
        }

        .col-md-6 {
            width: 50%;
        }

        .col-md-7 {
            width: 58.3333331%;
        }
        .col-md-8 {
            width: 66.6666664%;
        }



        .col-md-10: {
            width: 83.333333%;
        }

        .col-md-11: {
            width: 91.6666663%;
        }

        .col-md-12 {
            width: 100%;
        }

        .small {
            font-size: 0.8em;
        }
    </style>

    <!-- styles -->
    @stack('styles')
</head>

<body>

    {{-- <div style="page-break-inside:avoid;">
    </div> --}}

    <div id="header">
        <table style="font-size:0.9em;">
            <tr>
                <td class="col-md-6" colspan="" style="text-align:left; ">
                    <img src="https://uploaddeimagens.com.br/images/002/330/409/original/logo.png" width="200px">
                    <p class="small">
                        <b>{{ config('myconfig.razao_social_cocatrel') }}</b><br>
                        <b>CNPJ:</b> {{ config('myconfig.cnpj_cocatrel') }}
                    </p>
                </td>
                <td class="col-md-6" colspan="2" style="text-align:right; text-transform: uppercase; ">
                    <h1 class="title">@yield('title','Relatório')</h1>
                    <p class="small">
                        <b>DATA DE EMISSÃO:</b> {{ date('d/m/Y H:i') }}
                    </p>
                </td>
            </tr>

        </table>
    </div>
    <hr />
    <div id="content">
        @yield('content')
    </div>

    <div id="footer">
        <small>Em caso de dúvidas, entre em contato pelo telefone (35) 9999-9999 ou por email
            teste@teste.com.br.</small>

        <br />
        <hr>
        <p style="text-align:center">www.cocatrel.com.br</p>
    </div>


</body>

</html>
