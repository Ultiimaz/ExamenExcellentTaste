<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
<head>
    <style>
    /*! Invoice Templates @author: Invoicebus @email: info@invoicebus.com @web: https://invoicebus.com @version: 1.0.0 @updated: 2015-02-27 16:02:34 @license: Invoicebus */
    /* Reset styles */
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font: inherit;
    font-size: 100%;
    vertical-align: baseline;
    }

    html {
    line-height: 1;
    }

    ol, ul {
    list-style: none;
    }

    table {
    border-collapse: collapse;
    border-spacing: 0;
    }

    caption, th, td {
    text-align: left;
    font-weight: normal;
    vertical-align: middle;
    }

    q, blockquote {
    quotes: none;
    }
    q:before, q:after, blockquote:before, blockquote:after {
    content: "";
    content: none;
    }

    a img {
    border: none;
    }

    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
    display: block;
    }

    /* Invoice styles */
    /**
    * DON'T override any styles for the <html> and <body> tags, as this may break the layout.
* Instead wrap everything in one main <div id="container"> element where you may change
    * something like the font or the background of the invoice
    */
    html, body {
    /* MOVE ALONG, NOTHING TO CHANGE HERE! */
    }

    /**
    * IMPORTANT NOTICE: DON'T USE '!important' otherwise this may lead to broken print layout.
    * Some browsers may require '!important' in oder to work properly but be careful with it.
    */
    .clearfix {
    display: block;
    clear: both;
    }

    .hidden {
    display: none;
    }

    b, strong, .bold {
    font-weight: bold;
    }

    #container {
    font: normal 13px/1.4em 'Open Sans', Sans-serif;
    margin: 0 auto;
    min-height: 1158px;
    background: #ffffff;
    background-size: 100% auto;
    color: #5B6165;
    position: relative;
    }

    #memo {
    padding-top: 50px;
    margin: 0 110px 0 60px;
    border-bottom: 1px solid #ddd;
    height: 115px;
    }
    #memo .logo {
    float: left;
    margin-right: 20px;
    }
    #memo .logo img {
    width: 150px;
    height: 100px;
    }
    #memo .company-info {
    float: right;
    text-align: right;
    }
    #memo .company-info > div:first-child {
    line-height: 1em;
    font-weight: bold;
    font-size: 22px;
    color: #B32C39;
    }
    #memo .company-info span {
    font-size: 11px;
    display: inline-block;
    min-width: 20px;
    }
    #memo:after {
    content: '';
    display: block;
    clear: both;
    }

    #invoice-title-number {
    font-weight: bold;
    margin: 30px 0;
    }
    #invoice-title-number span {
    line-height: 0.88em;
    display: inline-block;
    min-width: 20px;
    }
    #invoice-title-number #title {
    text-transform: uppercase;
    padding: 0px 2px 0px 60px;
    font-size: 50px;
    background: #F4846F;
    color: white;
    }
    #invoice-title-number #number {
    margin-left: 10px;
    font-size: 35px;
    position: relative;
    top: -5px;
    }

    #client-info {
    float: left;
    margin-left: 60px;
    min-width: 220px;
    }
    #client-info > div {
    margin-bottom: 3px;
    min-width: 20px;
    }
    #client-info span {
    display: block;
    min-width: 20px;
    }
    #client-info > span {
    text-transform: uppercase;
    }

    table {
    table-layout: fixed;
    }
    table th, table td {
    vertical-align: top;
    word-break: keep-all;
    word-wrap: break-word;
    }

    #items {
    margin: 35px 30px 0 30px;
    }
    #items .first-cell, #items table th:first-child, #items table td:first-child {
    width: 40px !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    text-align: right;
    }
    #items table {
    border-collapse: separate;
    width: 100%;
    }
    #items table th {
    font-weight: bold;
    padding: 5px 8px;
    text-align: right;
    background: #B32C39;
    color: white;
    text-transform: uppercase;
    }
    #items table th:nth-child(2) {
    width: 30%;
    text-align: left;
    }
    #items table th:last-child {
    text-align: right;
    }
    #items table td {
    padding: 9px 8px;
    text-align: right;
    border-bottom: 1px solid #ddd;
    }
    #items table td:nth-child(2) {
    text-align: left;
    }

    #sums {
    margin: 25px 30px 0 0;
    }
    #sums table {
    float: right;
    }
    #sums table tr th, #sums table tr td {
    min-width: 100px;
    padding: 9px 8px;
    text-align: right;
    }
    #sums table tr th {
    font-weight: bold;
    text-align: left;
    padding-right: 35px;
    }
    #sums table tr td.last {
    min-width: 0 !important;
    max-width: 0 !important;
    width: 0 !important;
    padding: 0 !important;
    border: none !important;
    }
    #sums table tr.amount-total th {
    text-transform: uppercase;
    }
    #sums table tr.amount-total th, #sums table tr.amount-total td {
    font-size: 15px;
    font-weight: bold;
    }
    #sums table tr:last-child th {
    text-transform: uppercase;
    }
    #sums table tr:last-child th, #sums table tr:last-child td {
    font-size: 15px;
    font-weight: bold;
    color: white;
    }

    #invoice-info {
    float: left;
    margin: 50px 40px 0 60px;
    }
    #invoice-info > div > span {
    display: inline-block;
    min-width: 20px;
    min-height: 18px;
    margin-bottom: 3px;
    }
    #invoice-info > div > span:first-child {
    color: black;
    }
    #invoice-info > div > span:last-child {
    color: #aaa;
    }
    #invoice-info:after {
    content: '';
    display: block;
    clear: both;
    }

    #terms {
    float: left;
    margin-top: 50px;
    }
    #terms .notes {
    min-height: 30px;
    min-width: 50px;
    color: #B32C39;
    }
    #terms .payment-info div {
    margin-bottom: 3px;
    min-width: 20px;
    }

    .thank-you {
    margin: 10px 0 30px 0;
    display: inline-block;
    min-width: 20px;
    text-transform: uppercase;
    font-weight: bold;
    line-height: 0.88em;
    float: right;
    padding: 0px 30px 0px 2px;
    font-size: 50px;
    background: #F4846F;
    color: white;
    }

    .ib_bottom_row_commands {
    margin-left: 30px !important;
    }

    /**
    * If the printed invoice is not looking as expected you may tune up
    * the print styles (you can use !important to override styles)
    */
    @media print {
    /* Here goes your print styles */
    }
</style>
    <meta charset="utf-8">
    <title>Cobardia (firebrick)</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Invoicebus Invoice Template">
    <meta name="author" content="Invoicebus">

    <meta name="template-hash" content="baadb45704803c2d1a1ac3e569b757d5">

</head>
<body>
<div id="container">
    <section id="memo">
        <div class="logo">
            <img src="data:image/jpeg;base64,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" />
        </div>

        <div class="company-info">
            <div>Excellent Taste</div>

            <br />

            <span>Hofstraat 1</span>

            <br />

            <span>7311 KN</span>

            <br />

            <span>Apeldoorn</span>

            <br />

            <span>055 378 2473</span>

            <br />

            <span>Excellent-Taste@gmail.com </span>
        </div>

    </section>

    <section id="invoice-title-number">

        <span id="title">Nota</span>
        <span id="number">{{$reservering->reserveernummer}}</span>

    </section>

    <div class="clearfix"></div>

    <section id="client-info">
        <span>Klant gegevens</span>
        <div>
            <span class="bold">{{$user->klantnummer}}</span>
        </div>

        <div>
            <span>{{$user->adres}}</span>
        </div>

        <div>
            <span>{{$user->postcode}}</span>
        </div>

        <div>
            <span>{{$user->plaats}}</span>
        </div>

        <div>
            <span>{{$user->email}}</span>
        </div>

        <div>
            <span>{{$user->telefoon}}</span>
        </div>
    </section>

    <div class="clearfix"></div>

    <section id="items">

        <table cellpadding="0" cellspacing="0">

            <tr>
                <th>Product</th>
                <th>Beschrijving</th>
                <th>Aantal</th>
                <th>Prijs los</th>
                <th>Prijs totaal</th>
            </tr>
            {{$totaalprijs = 0}}

            {{--foreach eromheen voor elk product op de bestellinglijstie--}}
            @foreach($orders as $order)
                <?php $product = $order->product();
                $regeltotaal = $order->aantalbesteld * $product[0]->prijs;?>

            <tr data-iterate="item">
                <td>{{$order->productnummer}}</td>
                <td>{{$product[0]->productomschrijving}}</td>
                <td>{{$order->aantalbesteld}}</td>
                <td>€{{$product[0]->prijs}}</td>
                <td>€{{ number_format($regeltotaal, 2,",",".") }}</td>
                {{$totaalprijs += $regeltotaal}}

            </tr>
            @endforeach
        </table>

    </section>

<hr>

    <div class="clearfix"></div>
    <br /><br /><br /><br /><br /><br />

    <section id="invoice-info">
        <div>
            <span>€{{ number_format($totaalprijs, 2,",",".") }}</span> <span> Reeds betaald </span>
        </div>
        <div>
            <span>Factuur datum: {{$reservering->datum}}</span><span></span>
        </div>
    </section>

    <section id="terms">

        <div class="notes">Bedankt voor uw bezoek bij Excellent Taste, hopelijk heeft het gesmaakt!</div>

        <br />



    </section>


</div>

</body>
</html>
