<?php
$vSTitulo ='Receba a News da';
$vSName = 'newsletter';
$pageName = "newsletter";
require_once 'header.php';
require_once 'include/constantes.php';
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 p-0">
                        <div class="row justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0">
                                <div class="center-div text-line-height-30">
                                    <div class="pb-5 roboto-bold text-black-theme text-lead-header text-uppercase">Newsletter DPM Educação</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                        <div class="col-12">
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Fone
                                </span>
                                <span class="info-medias-body">(51)3027.3400</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;E-mail
                                </span>
                                <span class="info-medias-body">cursos@dpmeducacao.com.br</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <img width="20" src="./icons-svg/icon-facebook.svg">&nbsp;Facebook
                                </span>
                                <span class="info-medias-body">dpmeducacao</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <img width="20" src="./icons-svg/icon-instagram.svg">&nbsp;Instagram
                                </span>
                                <span class="info-medias-body">dpmeducacao</span>
                            </div>
                        </div>
                    </div>-->
                    <html xmlns="https://www.w3.org/1999/xhtml">

                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>Integração</title>
                        <style type="text/css">
                            form.formIntegration2 *,
                            form.formIntegration2 *::before,
                            form.formIntegration2 *::after {
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                box-sizing: border-box;
                            }

                            form.formIntegration2 {
                                width: 100%;
                                margin: 0 auto;
                            }

                            form.formIntegration2 input[type="text"] {
                                outline: none;
                                width: 95%;
                            }

                            form.formIntegration2 select {
                                width: 100%;
                                overflow: auto;
                            }

                            form.formIntegration2 select.invi-select {
                                display: none;
                                width: 0px;
                                height: 0px;
                                border: none;
                            }

                            form.formIntegration2 textarea {
                                width: 100%;
                                height: 80px;
                                overflow: auto;
                                resize: vertical;
                            }

                            form.formIntegration2 div.containerMultiple {
                                width: 100%;
                                overflow: auto;
                                border: 1px solid #bec5cb;
                                padding: 2px;
                                background-color: #FFF;
                                position: relative;
                            }

                            form.formIntegration2 div.containerMultiple div {
                                min-height: 20px;
                            }

                            form.formIntegration2 div.containerMultiple div label {
                                white-space: nowrap;
                                display: inline-block;
                                position: relative;
                            }

                            form.formIntegration2 input.type_PHN_DDI {
                                text-align: center;
                            }

                            form.formIntegration2 div.div_PHN_DDI {
                                width: 28%;
                                margin-right: 2%;
                                text-align: center;
                                display: inline-block;
                            }

                            form.formIntegration2 div.div_PHN_NUM {
                                width: 70%;
                                display: inline-block;
                            }

                            form.formIntegration2 .div_PHN.hidden_DDI div.div_PHN_DDI {
                                width: 0;
                                display: none;
                            }

                            form.formIntegration2 .div_PHN.hidden_DDI div.div_PHN_NUM {
                                width: 100%;
                                display: inline-block;
                            }

                            form.formIntegration2 .field-error {
                                border-color: #CC0000 !important;
                            }

                            form.formIntegration2 .g-recaptcha {
                                margin-bottom: 5px;
                            }

                            form.formIntegration2 .DinamizeDivMessageSuccess,
                            form.formIntegration2 .DinamizeDivMessageAlert,
                            form.formIntegration2 .DinamizeDivMessageError,
                            form.formIntegration2 .DinamizeDivCaptchaMessage {
                                display: none;
                                margin: 0px 0px 10px;
                                color: rgb(255, 255, 255);
                                font-size: 14px;
                                font-family: robotoregular;
                                padding: 15px;
                            }

                            form.formIntegration2 .DinamizeDivMessageSuccess {
                                background-color: rgb(241, 241, 241);
                            }

                            form.formIntegration2 .DinamizeDivMessageAlert,
                            form.formIntegration2 .DinamizeDivMessageError,
                            form.formIntegration2 .DinamizeDivCaptchaMessage {
                                background-color: #ffa4a4;
                            }

                            form.formIntegration2 div.block {
                                display: block;
                                margin-bottom: 10px;
                            }

                            form.formIntegration2 div.block:last-child {
                                margin-bottom: 0px;
                            }

                            form.formIntegration2 div.vertical {
                                display: block;
                            }

                            form.formIntegration2 div.horizontal {
                                display: inline-block;
                                vertical-align: middle;
                            }

                            form.formIntegration2 div.horizontal.divlabel {
                                width: 28%;
                                margin-right: 2%;
                                text-align: right;
                            }

                            form.formIntegration2 div.horizontal.divinput {
                                width: 70%
                            }

                            form.formIntegration2 div.containerAllInline div.block {
                                display: inline-block;
                                margin-right: 5px;
                                margin-bottom: 5px;
                            }

                            form.formIntegration2 div.containerAllInline div.horizontal.divinput {
                                width: 182px
                            }

                            form.formIntegration2 .submit {
                                position: relative;
                                width: 100%
                            }

                            form.formIntegration2 .submit.class1 {
                                text-align: left;
                            }

                            form.formIntegration2 .submit.class2 {
                                text-align: left;
                                width: 70%
                            }

                            form.formIntegration2 .submit.class3 {
                                text-align: center;
                            }

                            form.formIntegration2 .submit.class4 {
                                text-align: right;
                            }

                            form.formIntegration2 .submit.class5 {
                                text-align: center;
                            }

                            form.formIntegration2 .submit.class5 input[type=submit] {
                                width: 100%
                            }

                            form.formIntegration2 .spinner {
                                display: none;
                            }

                            form.formIntegration2 {
                                font-family: robotoregular;
                                font-size: 14px;
                            }

                            form.formIntegration2.style1 label {
                                color: #4a5765;
                                font-family: robotoregular;
                                font-size: 14px;
                            }

                            form.formIntegration2.style1 input[type="text"] {
                                font-family: robotoregular;
                                border: 1px solid #bec5cb;
                                color: #4a5766;
                                font-size: 15px;
                                padding: 9px 6px;
                                height: 47px;
                            }

                            form.formIntegration2.style1 input[type="submit"] {
                                -webkit-appearance: none;
                                border: medium none;
                                background-color: orange;
                                color: #ffffff;
                                cursor: pointer;
                                font: bold 16px robotoregular;
                                height: 38px;
                                padding: 0 25px;
                                display: inline-block;
                                -webkit-border-radius: 3px;
                                -moz-border-radius: 3px;
                                border-radius: 3px;
                                margin: 15px 0 0 0;
                            }

                            form.formIntegration2.style1 div.containerMultiple,
                            form.formIntegration2.style1 select,
                            form.formIntegration2.style1 textarea {
                                border: none;
                                border-radius: 3px;
                                -webkit-border-radius: 3px;
                                -moz-border-radius: 3px;
                                box-shadow: 0 0 0 4px transparent;
                                color: #4a5766;
                            }

                            form.formIntegration2.style1 select {
                                height: 40px;
                            }

                            form.formIntegration2.style1 textarea {
                                max-height: 200px;
                                min-height: 52px;
                            }

                            form.formIntegration2.style1 .spinner {
                                display: none;
                                bottom: 0;
                                height: 18px;
                                left: 0;
                                margin: auto;
                                position: absolute;
                                right: 0;
                                top: 0;
                            }

                            form.formIntegration2.style1 .spinner>div {
                                width: 18px;
                                height: 18px;
                                background-color: #fff;
                                border-radius: 100%;
                                display: inline-block;
                                -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
                                animation: sk-bouncedelay 1.4s infinite ease-in-out both;
                            }

                            form.formIntegration2.style1 .spinner .bounce1 {
                                -webkit-animation-delay: -0.32s;
                                animation-delay: -0.32s;
                            }

                            form.formIntegration2.style1 .spinner .bounce2 {
                                -webkit-animation-delay: -0.16s;
                                animation-delay: -0.16s;
                            }

                            form.formIntegration2.style1 .checkbox-container {
                                display: block;
                                position: absolute !important;
                                padding-left: 22px;
                                margin-bottom: 4px;
                                cursor: pointer;
                                -webkit-user-select: none;
                                -moz-user-select: none;
                                -ms-user-select: none;
                                user-select: none;
                            }

                            form.formIntegration2.style1 .checkbox-container input {
                                position: absolute;
                                opacity: 0;
                                cursor: pointer;
                                height: 0;
                                width: 0;
                                top: 0;
                                left: 0;
                            }

                            form.formIntegration2.style1 .checkmark {
                                position: absolute;
                                top: 0;
                                left: 0;
                                height: 18px;
                                width: 18px;
                                background-color: #FFF;
                                border: 2px solid #BBB;
                                border-radius: 3px;
                            }

                            form.formIntegration2.style1 .checkbox-container:hover input~.checkmark {
                                border: 2px solid #777;
                            }

                            form.formIntegration2.style1 .checkmark:after {
                                content: "";
                                position: absolute;
                                display: none;
                            }

                            form.formIntegration2.style1 .checkbox-container input:checked~.checkmark:after {
                                display: block;
                            }

                            form.formIntegration2.style1 .checkbox-container .checkmark:after {
                                left: 5px;
                                top: 0px;
                                width: 5px;
                                height: 12px;
                                border: solid #555;
                                border-width: 0 3px 3px 0;
                                -webkit-transform: rotate(45deg);
                                -ms-transform: rotate(45deg);
                                transform: rotate(45deg);
                            }

                            form.cursos-in-company label.required::before {
                                content: ' *';
                                display: inline-block;
                                position: absolute;
                                top: 22px;
                                color: red;
                                font-size: 21px;
                                float: left;
                            }

                            form.formIntegration2.style2 label {
                                font-family: robotoregular;
                                font-size: 14px;
                            }

                            form.formIntegration2.style2 input[type="text"] {
                                border: 1px solid #bec5cb;
                                box-shadow: 0 0 0 4px transparent;
                                color: #4a5766;
                                font-size: 13px;
                                padding: 9px 6px;
                            }

                            form.formIntegration2.style2 div.containerMultiple {
                                max-height: 82px;
                            }

                            form.formIntegration2.style2 div.containerMultiple,
                            form.formIntegration2.style2 select,
                            form.formIntegration2.style2 textarea {
                                border: 1px solid #bec5cb;
                                box-shadow: 0 0 0 4px transparent;
                                color: #4a5766;
                            }

                            form.formIntegration2.style2 select {
                                height: 40px;
                            }

                            form.formIntegration2.style2 textarea {
                                max-height: 200px;
                                min-height: 52px;
                            }

                            form.formIntegration2.style2 ::-webkit-input-placeholder {
                                color: #000000;
                            }

                            form.formIntegration2.style2 ::-moz-placeholder {
                                color: #000000;
                                font-family: robotoregular;
                            }

                            form.formIntegration2.style2 :-ms-input-placeholder {
                                color: #000000;
                                font-family: robotoregular;
                            }

                            form.formIntegration2.style2 :-moz-placeholder {
                                color: #000000;
                                font-family: robotoregular;
                            }

                            form.formIntegration2.style2 .spinner {
                                display: none;
                                bottom: 0;
                                height: 18px;
                                left: 0;
                                margin: auto;
                                position: absolute;
                                right: 0;
                                top: 0;
                            }

                            form.formIntegration2.style2 .spinner>div {
                                width: 18px;
                                height: 18px;
                                background-color: #fff;
                                border-radius: 100%;
                                display: inline-block;
                                -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
                                animation: sk-bouncedelay 1.4s infinite ease-in-out both;
                            }

                            form.formIntegration2.style2 .spinner .bounce1 {
                                -webkit-animation-delay: -0.32s;
                                animation-delay: -0.32s;
                            }

                            form.formIntegration2.style2 .spinner .bounce2 {
                                -webkit-animation-delay: -0.16s;
                                animation-delay: -0.16s;
                            }

                            @-webkit-keyframes sk-bouncedelay {

                                0%,
                                80%,
                                100% {
                                    -webkit-transform: scale(0)
                                }

                                40% {
                                    -webkit-transform: scale(1.0)
                                }
                            }

                            @keyframes sk-bouncedelay {

                                0%,
                                80%,
                                100% {
                                    -webkit-transform: scale(0);
                                    transform: scale(0);
                                }

                                40% {
                                    -webkit-transform: scale(1.0);
                                    transform: scale(1.0);
                                }
                            }
                        </style>
                    </head>

                    <body>
                        <form version="2.0" class="formIntegration formIntegration2 style1" accept-charset="UTF-8" method="post" onsubmit="return dinForms.ValidateForm(this)" action="https://receiver.emkt.dinamize.com/in/307180/1/a10a4/0" target="DinamizeIframeFormIntegration">
                            <input type="hidden" name="update_mode" value="AS" />
                            <input type="hidden" name="form-code" value="8" />
                            <input type="hidden" name="isMsg" value="true" />
                            <div class="DinamizeDivCaptchaMessage">Captcha obrigatório</div>
                            <div class="DinamizeDivMessageAlert"></div>
                            <div class="DinamizeDivMessageSuccess"><b>Obrigado.<br />Seu e-mail foi cadastrado com sucesso!<br />Em breve voc&ecirc; receber&aacute; nossa newsletter.</b></div>
                            <div class="DinamizeDivMessageError"><b>Preencha os campos obrigat&oacute;rios.</b></div>
                            <input type="hidden" name="text-confirmation" value="PGI+T2JyaWdhZG8uPGJyIC8+U2V1IGUtbWFpbCBmb2kgY2FkYXN0cmFkbyBjb20gc3VjZXNzbyE8YnIgLz5FbSBicmV2ZSB2b2MmZWNpcmM7IHJlY2ViZXImYWFjdXRlOyBub3NzYSBuZXdzbGV0dGVyLjwvYj4=" />
                            <input type="hidden" name="text-error" value="" />
                            <input type="hidden" name="text-alert" value="PGI+UHJlZW5jaGEgb3MgY2FtcG9zIG9icmlnYXQmb2FjdXRlO3Jpb3MuPC9iPg==" /><input type="hidden" name="ignore-fields" value="on" /><input type="hidden" name="phase-change" value="off" />
                            <div class=""><span class="float-left mr-1"><img src="imgs/asterisco.png" width="10" alt="" /></span>
                                <div class="block">
                                    <div class="vertical divlabel"></div>
                                    <div class="vertical divinput"><input type="text" name="cmp1" placeholder="E-mail" format="" class="type_EMAIL field-required mb-4" maxlength="80" />
                                    </div>
                                </div><span class="float-left mr-1"><img src="imgs/asterisco.png" width="10" alt="" /></span>
                                <div class="block">
                                    <div class="vertical divlabel"></div>
                                    <div class="vertical divinput"><input type="text" name="cmp2" placeholder="Nome" format="" class="type_VC field-required mb-4" maxlength="80" />
                                    </div>
                                </div><span class="float-left mr-1"><img src="imgs/asterisco.png" width="10" alt="" /></span>
                                <div class="block">
                                    <div class="vertical divlabel"></div>
                                    <div class="vertical divinput"><input type="text" name="cmp9" din-mask-type="INT" placeholder="Telefone" format="" class="mb-4 type_INT  din-input-mask" maxlength="10" />
                                    </div>
                                </div><span class="float-left mr-1"><img src="imgs/asterisco.png" width="10" alt="" /></span>
                                <div class="block pb-3 mb-3">
                                    <div class="vertical divlabel"></div>
                                    <div class="vertical divinput"><input type="text" name="cmp13" placeholder="Cargo" format="" class="type_VC  " maxlength="80" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="float-left mr-1"><img src="imgs/asterisco.png" width="10" alt="" /></span>
                                        <div class="text-blue-theme roboto-bold" style="width: 95%">Campos com preenchimento obrigatório!</div>
                                    </div>

                                </div>
                                <!--<div class="block"><div class="vertical divlabel"><label>Secretaria</label></div><div class="vertical divinput"><input type="text" name="cmp14"  placeholder="" format=""  class="type_VC  " maxlength="80" />
                                    </div>-->
                            </div>
                            <div class="block">
                                <div class="vertical divlabel" style="font-weight: bold"><label>Área(s) de interesse</label></div>
                                <div class="vertical divinput">
                                    <div class="containerMultiple containerMultiple_cmp17" style="max-height: 100%">
                                        <select multiple="multiple" hd-name="cmp17" class="invi-select field-required type_LVM"></select>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="CONTABILIDADE PÚBLICA E ORÇAMENTO MUNICIPAL"> CONTABILIDADE PÚBLICA E ORÇAMENTO MUNICIPAL</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="DIREITOS COLETIVOS E SOCIAIS"> DIREITOS COLETIVOS E SOCIAIS</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="GESTÃO ADMINISTRATIVA E DE CONTROLE MUNICIPAL"> GESTÃO ADMINISTRATIVA E DE CONTROLE MUNICIPAL</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="GESTÃO DA EDUCAÇÃO MUNICIPAL"> GESTÃO DA EDUCAÇÃO MUNICIPAL</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="GESTÃO DE PESSOAS NO SERVIÇO PÚBLICO MUNICIPAL"> GESTÃO DE PESSOAS NO SERVIÇO PÚBLICO MUNICIPAL</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="JURÍDICA E CONTENCIOSO MUNICIPAL"> JURÍDICA E CONTENCIOSO MUNICIPAL</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="LEGISLATIVO MUNICIPAL"> LEGISLATIVO MUNICIPAL</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="LICITAÇÕES E CONTRATOS ADMINISTRATIVOS"> LICITAÇÕES E CONTRATOS ADMINISTRATIVOS</label> </div>
                                        <div> <label><input type="checkbox" class="chk_cmp17" value="TRIBUTOS E ARRECADAÇÃO MUNICIPAL"> TRIBUTOS E ARRECADAÇÃO MUNICIPAL</label> </div><input type="hidden" name="cmp17" /><input type="hidden" name="cmp17_action" value="replacement" />
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <div class="vertical class1 submit submit-button-td">
                                    <input type="submit" value="Cadastre-se" original-value="Cadastre-se" class="dinSubmit" />
                                    <div class="spinner">
                                        <div class="bounce1"></div>
                                        <div class="bounce2"></div>
                                        <div class="bounce3"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </body>

                    </html>
                    <script type="text/javascript">
                        /* Suggested Phone Validation ==> https://jackocnr.com/intl-tel-input.html*/

                        ! function(t, e) {
                            "function" == typeof define && define.amd ? define(e) : "object" == typeof exports ? module.exports = e() : t.VMasker = e()
                        }(this, function() {
                            var t = "9",
                                e = "A",
                                n = "S",
                                i = [8, 9, 16, 17, 18, 36, 37, 38, 39, 40, 91, 92, 93],
                                o = function(t) {
                                    for (var e = 0, n = i.length; n > e; e++)
                                        if (t == i[e]) return !1;
                                    return !0
                                },
                                r = function(t) {
                                    return t = t || {}, t = {
                                        precision: t.hasOwnProperty("precision") ? t.precision : 2,
                                        separator: t.separator || ",",
                                        unit: t.unit && t.unit.replace(/[\s]/g, "") + " " || "",
                                        suffixUnit: t.suffixUnit && " " + t.suffixUnit.replace(/[\s]/g, "") || "",
                                        zeroCents: t.zeroCents,
                                        lastOutput: t.lastOutput
                                    }, t.moneyPrecision = t.zeroCents ? 0 : t.precision, t
                                },
                                s = function(i, o, r) {
                                    for (; o < i.length; o++)(i[o] === t || i[o] === e || i[o] === n) && (i[o] = r);
                                    return i
                                },
                                l = function(t) {
                                    this.elements = t
                                };
                            l.prototype.unbindElementToMask = function() {
                                for (var t = 0, e = this.elements.length; e > t; t++) this.elements[t].lastOutput = "", this.elements[t].onkeyup = !1, this.elements[t].onkeydown = !1, this.elements[t].value.length && (this.elements[t].value = this.elements[t].value.replace(/\D/g, ""))
                            }, l.prototype.bindElementToMask = function(t) {
                                for (var e = this, n = function(n) {
                                        n = n || window.event;
                                        var i = n.target || n.srcElement;
                                        o(n.keyCode) && setTimeout(function() {
                                            e.opts.lastOutput = i.lastOutput, i.value = a[t](i.value, e.opts), i.lastOutput = i.value, i.setSelectionRange && e.opts.suffixUnit && i.setSelectionRange(i.value.length, i.value.length - e.opts.suffixUnit.length)
                                        }, 0)
                                    }, i = 0, r = this.elements.length; r > i; i++) this.elements[i].lastOutput = "", this.elements[i].onkeyup = n, this.elements[i].value.length && (this.elements[i].value = a[t](this.elements[i].value, this.opts))
                            }, l.prototype.maskMoney = function(t) {
                                this.opts = r(t), this.bindElementToMask("toMoney")
                            }, l.prototype.maskNumber = function() {
                                this.opts = {}, this.bindElementToMask("toNumber")
                            }, l.prototype.maskAlphaNum = function() {
                                this.opts = {}, this.bindElementToMask("toAlphaNumeric")
                            }, l.prototype.maskPattern = function(t) {
                                this.opts = {
                                    pattern: t
                                }, this.bindElementToMask("toPattern")
                            }, l.prototype.unMask = function() {
                                this.unbindElementToMask()
                            };
                            var a = function(t) {
                                if (!t) throw new Error("VanillaMasker: There is no element to bind.");
                                var e = "length" in t ? t.length ? t : [] : [t];
                                return new l(e)
                            };
                            return a.toMoney = function(t, e) {
                                if (e = r(e), e.zeroCents) {
                                    e.lastOutput = e.lastOutput || "";
                                    var n = "(" + e.separator + "[0]{0," + e.precision + "})",
                                        i = new RegExp(n, "g"),
                                        o = t.toString().replace(/[\D]/g, "").length || 0,
                                        s = e.lastOutput.toString().replace(/[\D]/g, "").length || 0;
                                    t = t.toString().replace(i, ""), s > o && (t = t.slice(0, t.length - 1))
                                }
                                var l = t.toString().replace(/[\D]/g, ""),
                                    a = new RegExp("(\\" + e.separator + ")$"),
                                    u = l.substr(0, l.length - e.moneyPrecision),
                                    p = u.substr(0, u.length % 3),
                                    h = new Array(e.precision + 1).join("");
                                u = u.substr(u.length % 3, u.length);
                                for (var c = 0, f = u.length; f > c; c++) p += u[c];
                                if (!e.zeroCents) {
                                    var g = l.length - e.precision,
                                        m = l.substr(g, e.precision),
                                        v = m.length,
                                        y = e.precision > v ? e.precision : v;
                                    h = (h + m).slice(-y)
                                }
                                var b = e.unit + p + e.separator + h + e.suffixUnit;
                                return b.replace(a, "")
                            }, a.toPattern = function(i, o) {
                                var r, l = "object" == typeof o ? o.pattern : o,
                                    a = l.replace(/\W/g, ""),
                                    u = l.split(""),
                                    p = i.toString().replace(/\W/g, ""),
                                    h = p.replace(/\W/g, ""),
                                    c = 0,
                                    f = u.length,
                                    g = "object" == typeof o ? o.placeholder : void 0;
                                for (r = 0; f > r; r++) {
                                    if (c >= p.length) {
                                        if (a.length == h.length) return u.join("");
                                        if (void 0 !== g && a.length > h.length) return s(u, r, g).join("");
                                        break
                                    }
                                    if (u[r] === t && p[c].match(/[0-9]/) || u[r] === e && p[c].match(/[a-zA-Z]/) || u[r] === n && p[c].match(/[0-9a-zA-Z]/)) u[r] = p[c++];
                                    else if (u[r] === t || u[r] === e || u[r] === n) return void 0 !== g ? s(u, r, g).join("") : u.slice(0, r).join("")
                                }
                                return u.join("").substr(0, r)
                            }, a.toNumber = function(t) {
                                return t.toString().replace(/(?!^-)[^0-9]/g, "")
                            }, a.toAlphaNumeric = function(t) {
                                return t.toString().replace(/[^a-z0-9 ]+/i, "")
                            }, a
                        });

                        // Mantem apenas a versão mais recente do script
                        if (typeof dinForms == "undefined" || dinForms.version < 1.3) {
                            var dinForms = {
                                version: 1.3,
                                onLoad: function() {
                                    //
                                    var forms = document.getElementsByClassName("formIntegration");
                                    for (var k = 0; k < forms.length; ++k) {
                                        var inputElement = forms[k].getElementsByClassName("din-input-mask");
                                        for (var i = 0; i < inputElement.length; ++i) {
                                            switch (inputElement[i].getAttribute("din-mask-type")) {
                                                case "DT":
                                                case "DH":
                                                    var str = inputElement[i].getAttribute("format");
                                                    VMasker(inputElement[i]).maskPattern(str.replace(/D|M|A|Y|H/g, "9"));
                                                    break;
                                                case "INT":
                                                    VMasker(inputElement[i]).maskNumber();
                                                    break;
                                                case "FLT":
                                                    var str = inputElement[i].getAttribute("format");
                                                    VMasker(inputElement[i]).maskMoney({
                                                        separator: str
                                                    });
                                                    break;
                                            }
                                        }
                                    }

                                    //
                                    var referer = document.referrer ? document.referrer.match(/:\/\/(.[^/]+)/)[1] : "";
                                    var hostname = window.location.hostname;
                                    if (referer != hostname) {
                                        var jsonParams = {
                                            "url": window.location.href,
                                            "referer": document.referrer
                                        };
                                        var cookieData = btoa(JSON.stringify(jsonParams));
                                        dinForms.SetCookie("dinTrafficSource", cookieData, 90);
                                    }
                                },
                                ValidateForm: function(form) {
                                    this.LimpaAvisos(form);

                                    /********************************************************/
                                    // validação de cada tipo de campo
                                    /********************************************************/
                                    var elem = form.elements;
                                    var enviar = true;
                                    for (var i = 0; i < elem.length; i++) {
                                        if (elem[i].type == "hidden") {
                                            continue
                                        }

                                        var classList = elem[i].className.split(" ");

                                        this.removeClass("field-error", elem[i]);
                                        elem[i].value = elem[i].value.trim();

                                        if (classList.indexOf("type_EMAIL") != -1) {
                                            if (!this.validateEmail(elem[i].value)) {
                                                this.addClass("field-error", elem[i]);
                                                enviar = false;
                                            }
                                        } else if (classList.indexOf("type_DT") != -1) {
                                            if (elem[i].value != "" && !this.existDate(this.prepareDate(elem[i].value, elem[i].getAttribute("format")), false)) {
                                                this.addClass("field-error", elem[i]);
                                                enviar = false;
                                            }
                                        } else if (classList.indexOf("type_DH") != -1) {
                                            if (elem[i].value != "" && !this.existDate(this.prepareDate(elem[i].value, elem[i].getAttribute("format")), true)) {
                                                this.addClass("field-error", elem[i]);
                                                enviar = false;
                                            }
                                        } else if (classList.indexOf("type_PHN_NUM") != -1) {
                                            var fieldName = elem[i].getAttribute("hd-name");
                                            var text = elem[i].value;
                                            var patPhone = /\d+/g;
                                            var res;
                                            var resultNum = "";
                                            var resultDDI = "";
                                            res = text.match(patPhone);

                                            if (res !== null) {
                                                resultNum = res.join("");
                                            }

                                            form.elements[fieldName].value = "";

                                            if (text != "" && resultNum.length < 3) {
                                                this.addClass("field-error", elem[i]);
                                                enviar = false;
                                            } else if (resultNum.length >= 3) {

                                                text = form.elements[fieldName + "_DDI"].value
                                                res = text.match(patPhone);

                                                if (res !== null) {
                                                    resultDDI = res.join("");
                                                    form.elements[fieldName].value = resultDDI + resultNum;
                                                } else {
                                                    this.addClass("field-error", form.elements[fieldName + "_DDI"]);
                                                    enviar = false;
                                                }
                                            }
                                        }

                                        // CAMPOS OBRIGATORIOS
                                        if (classList.indexOf("field-required") != -1) {

                                            // Todos os campos não-LVM
                                            if (classList.indexOf("type_LVM") == -1) {
                                                if (elem[i].value.trim() == "") {
                                                    this.addClass("field-error", elem[i]);
                                                    enviar = false;
                                                }
                                            }

                                            // else lvm...
                                            if (classList.indexOf("type_LVM") != -1) {
                                                var hdName = elem[i].getAttribute("hd-name");
                                                var ok = false;

                                                this.removeClass("field-error", form.getElementsByClassName("containerMultiple_" + hdName)[0]); // é o único caso que a classe é removida deste jeito

                                                var checkboxes = form.getElementsByClassName("chk_" + hdName);
                                                for (var j = 0; j < checkboxes.length; j++) {
                                                    if (checkboxes[j].checked == true) {
                                                        ok = true;
                                                        break;
                                                    }
                                                }
                                                if (!ok) {
                                                    this.addClass("field-error", form.getElementsByClassName("containerMultiple_" + hdName)[0]);
                                                    enviar = false;
                                                }
                                            }
                                        }

                                    }
                                    /********************************************************/
                                    // Em caso de falha na validação...
                                    // Mensagem de Campo Obrigatório
                                    /********************************************************/
                                    if (!enviar) {
                                        var msgError = form.getElementsByClassName("DinamizeDivMessageError")[0];
                                        if (msgError && msgError.innerHTML.length) {
                                            msgError.style.display = "block";
                                        }
                                        return false
                                    }

                                    /********************************************************/
                                    // Escreve valores nos campos hidden (quando necessário)
                                    /********************************************************/

                                    // Listas de Valores Multiplos (LVM)
                                    var lvmElements = form.getElementsByClassName("type_LVM");
                                    var checkboxes, checkedValues;
                                    var hdName;
                                    for (var i = 0; i < lvmElements.length; i++) {
                                        hdName = lvmElements[i].getAttribute("hd-name");

                                        checkboxes = form.getElementsByClassName("chk_" + hdName);
                                        checkedValues = "";

                                        if (checkboxes.length > 0) {
                                            for (var k = 0; k < checkboxes.length; k++) {
                                                if (checkboxes[k].checked) {
                                                    checkedValues += "|" + checkboxes[k].value;
                                                }
                                            }
                                        }
                                        checkedValues = checkedValues.replace("|", "");
                                        form.elements[lvmElements[i].getAttribute("hd-name")].value = checkedValues;
                                    }

                                    // Datas
                                    this.setDateValues(form, "type_DT");
                                    this.setDateValues(form, "type_DH");

                                    // Floats
                                    var fltElements = form.getElementsByClassName("type_FLT");
                                    for (var i = 0; i < fltElements.length; i++) {
                                        form.elements[fltElements[i].getAttribute("hd-name")].value = fltElements[i].value.replace(",", ".");
                                    };

                                    /********************************************************/
                                    // finalizando...
                                    /********************************************************/

                                    //  se for preview... dá msg de sucesso e cai fora!
                                    var isPreview = form.elements["isPreview"];
                                    if (isPreview) {
                                        dinForms.ResetFormValues(form);
                                        return false
                                    }

                                    // LEADTRACKER
                                    // Precisamos descobrir se o objeto de leadTracker existe no mesmo frame que este formulário está, ou se está no parent (ou no top).
                                    // Usamos a referencia deste frame a partir disto.
                                    // Para ter o máximo de compatibilidade, verifico se o browser suporta estes objetos.
                                    // Resolve idealmente o uso de leadtracker por popups

                                    // faz try-catch pois o frame parent/top pode ser de outro dominio, isto gerará um erro do tipo cross-domain.
                                    try {
                                        var frame
                                        if (typeof dinLeadTracker !== "undefined") {
                                            frame = window;
                                        } else if (typeof window.parent !== "undefined" && typeof window.parent.dinLeadTracker !== "undefined") {
                                            frame = window.parent;
                                        } else if (typeof window.top !== "undefined" && typeof window.top.dinLeadTracker !== "undefined") {
                                            frame = window.top;
                                        }

                                        // se encontramos leadtracker em algum dos frames, seta!
                                        if (typeof frame !== "undefined" && frame.dinLeadTracker.isActive()) {
                                            var formElements = form.elements;
                                            if (typeof formElements.cmp1 !== "undefined") {
                                                frame.dinLeadTracker.SetLeadEmail(formElements.cmp1.value);
                                            }
                                            if (typeof formElements.cmp3 !== "undefined") {
                                                frame.dinLeadTracker.SetLeadExternalId(formElements.cmp3.value);
                                            }
                                        }
                                    } catch (e) {
                                        console.warn("Leadtracker ignored because of Cross-Domain error.");
                                        console.warn(e);
                                    }

                                    // Se o form usa "msg", não faz action com redirect.
                                    var isMsg = form.elements["isMsg"].value;
                                    var redirectElement = form.elements["redirect-url-js"] ? form.elements["redirect-url-js"] : form.elements["redirect-url-pp"];
                                    if (isMsg == "true" || (redirectElement && redirectElement.value != "")) {
                                        this.LoadingForm(form);
                                        return false; // posta o conteudo, mas não executa action do form
                                    }

                                    // Posta pro nosso receiver e este fará um redirect.
                                    return true;
                                },
                                setDateValues: function(form, className) {
                                    var dtElements = form.getElementsByClassName(className);
                                    for (var i = 0; i < dtElements.length; i++) {
                                        if (dtElements[i].value == "") {
                                            continue;
                                        }
                                        form.elements[dtElements[i].getAttribute("hd-name")].value = this.prepareDate(dtElements[i].value, dtElements[i].getAttribute("format"));
                                    };
                                },
                                // NOVO, apenas landing page
                                SetCookie: function(cname, cvalue, exdays) {
                                    var d = new Date();
                                    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                                    var expires = "expires=" + d.toUTCString();
                                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                                },
                                hasCaptcha: function(form) {
                                    // Detecta se existe este elemento (deprecated) de captcha.
                                    if (form.elements["dnz-captcha-google"] != undefined) {
                                        return true;
                                    }
                                    // Validação normal
                                    var action = form.getAttribute("action");
                                    if (action === null) {
                                        return false;
                                    }

                                    action = action.split("/");
                                    if (action.length == 8) {
                                        if (action[7] == 1) {
                                            return true;
                                        }
                                    }
                                    return false;
                                },
                                LoadingForm: function(form) {
                                    // só para site e landingpage
                                    var isCaptcha = this.hasCaptcha(form);
                                    if (isCaptcha) {
                                        form.getElementsByClassName("DinamizeDivCaptchaMessage")[0].style.display = "none";
                                        var recaptcha = form.elements["g-recaptcha-response"];
                                        if (recaptcha.value === "") {
                                            form.getElementsByClassName("DinamizeDivCaptchaMessage")[0].style.display = "block";
                                            grecaptcha.reset(); // ver se precisa
                                            return;
                                        }
                                    }

                                    //
                                    if (document.getElementById("DinamizeIframeFormIntegration") == undefined) {
                                        var ifrm = document.createElement("iframe");
                                        ifrm.setAttribute("id", "DinamizeIframeFormIntegration");
                                        ifrm.setAttribute("name", "DinamizeIframeFormIntegration");
                                        ifrm.style.display = "none";
                                        document.body.appendChild(ifrm);
                                    }

                                    if (this.GetCookie("dinTrafficSource")) {
                                        // MANTER COM ID, SÓ PRECISAMOS DE UM POR document
                                        if (document.getElementById("__dinTrafficSource")) {
                                            document.getElementById("__dinTrafficSource").setAttribute("value", this.GetCookie("dinTrafficSource"));
                                        } else {
                                            var ts = document.createElement("input");
                                            ts.type = "hidden";
                                            ts.name = "__dinTrafficSource";
                                            // MANTER COM ID, SÓ PRECISAMOS DE UM POR document
                                            ts.id = "__dinTrafficSource";
                                            ts.value = this.GetCookie("dinTrafficSource");
                                            form.appendChild(ts);
                                        }
                                    }

                                    this.Spinner(form, true);

                                    var redirectElement = form.elements["redirect-url-pp"];
                                    if (redirectElement && redirectElement.value != "") {
                                        this.Request(form.getAttribute("action") + "/", this.serialize(form), form);
                                    } else {
                                        // Usa um "img" para fazer uma requisição
                                        var imgReq = document.createElement("img");
                                        imgReq.setAttribute("id", "DinamizeImgResponse");
                                        imgReq.style.display = "none"; // redundancia

                                        imgReq.onload = function() {
                                            // LandingPage
                                            redirectElement = form.elements["redirect-url-js"];
                                            if (redirectElement && redirectElement.value != "") {
                                                location.href = redirectElement.value;
                                            }
                                            // Fim LandingPage
                                            dinForms.Spinner(form, false);
                                            dinForms.ResetFormValues(form);
                                        }
                                        imgReq.onerror = function() {
                                            dinForms.Spinner(form, false);

                                            // elemento deprecated
                                            var msgErrorDep = form.getElementsByClassName("divMessageError")[0];
                                            if (msgErrorDep) {
                                                msgErrorDep.style.display = "block";
                                            }

                                            var msgAlert = form.getElementsByClassName("DinamizeDivMessageAlert")[0];
                                            if (msgAlert) {
                                                msgAlert.style.display = "block";
                                            }
                                        }
                                        imgReq.src = form.getAttribute("action") + "/?" + this.serialize(form) + "&a=" + Math.floor((Math.random() * 99999) + 1);
                                        form.appendChild(imgReq);
                                    }
                                    if (isCaptcha) {
                                        grecaptcha.reset();
                                    }
                                },
                                Request: function(url, params, form) {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
                                            if (xmlhttp.status >= 200 && xmlhttp.status <= 299) {
                                                parent.location.href = form.elements["redirect-url-pp"].value;
                                                dinForms.Spinner(form, false);
                                                dinForms.ResetFormValues(form);
                                            } else {
                                                dinForms.Spinner(form, false);
                                                // elemento deprecated
                                                var msgErrorDep = form.getElementsByClassName("divMessageError")[0];
                                                if (msgErrorDep) {
                                                    msgErrorDep.style.display = "block";
                                                }
                                                var msgAlert = form.getElementsByClassName("DinamizeDivMessageAlert")[0];
                                                if (msgAlert) {
                                                    msgAlert.style.display = "block";
                                                }
                                            }
                                        }
                                    };
                                    if (typeof params === "string" && params !== "") {
                                        url += "?" + params; // encodeURI(params);
                                    }

                                    xmlhttp.open("POST", url, true);
                                    xmlhttp.send();
                                },
                                Spinner: function(form, show) {
                                    // manter versão por compatibilidade?
                                    var submitElement = form.getElementsByClassName("dinSubmit")[0];
                                    var spinnerElement = form.getElementsByClassName("spinner")[0];

                                    if (show) {
                                        if (spinnerElement)
                                            spinnerElement.style.display = "block";

                                        if (submitElement)
                                            submitElement.value = "";

                                    } else {
                                        if (spinnerElement)
                                            spinnerElement.style.display = "none";

                                        if (submitElement)
                                            submitElement.value = submitElement.getAttribute("original-value");
                                    }
                                },
                                GetCookie: function(cname) {
                                    var name = cname + "=";
                                    var decodedCookie = decodeURIComponent(document.cookie);
                                    var ca = decodedCookie.split(";");
                                    for (var i = 0; i < ca.length; i++) {
                                        var c = ca[i];
                                        while (c.charAt(0) == " ") {
                                            c = c.substring(1);
                                        }
                                        if (c.indexOf(name) == 0) {
                                            return c.substring(name.length, c.length);
                                        }
                                    }
                                    return "";
                                },
                                ResetFormValues: function(form) {
                                    // jquery existe?
                                    if (typeof($) != "undefined") {
                                        // iCheck existe?
                                        if ((typeof($().iCheck) != "undefined")) {
                                            $(form).find("input[type=\"checkbox\"]:not(.cssOnly)").iCheck("uncheck");
                                        }
                                    }

                                    var msgSuccess = form.getElementsByClassName("DinamizeDivMessageSuccess")[0];
                                    if (msgSuccess) {
                                        msgSuccess.style.display = "block";
                                    }
                                    var imgRequest = document.getElementById("DinamizeImgResponse");
                                    if (imgRequest) {
                                        imgRequest.remove();
                                    }
                                    form.reset();
                                },
                                LimpaAvisos: function(form) {
                                    var msgSuccess = form.getElementsByClassName("DinamizeDivMessageSuccess")[0];
                                    if (msgSuccess)
                                        msgSuccess.style.display = "none";

                                    var msgAlert = form.getElementsByClassName("DinamizeDivMessageAlert")[0];
                                    if (msgAlert)
                                        msgAlert.style.display = "none";

                                    var msgError = form.getElementsByClassName("DinamizeDivMessageError")[0];
                                    if (msgError)
                                        msgError.style.display = "none";

                                    // elemento deprecated, de landingPage
                                    var msgErrorDep = form.getElementsByClassName("divMessageError")[0];
                                    if (msgErrorDep)
                                        msgErrorDep.style.display = "none";

                                    var msgCaptcha = form.getElementsByClassName("DinamizeDivCaptchaMessage")[0];
                                    if (msgCaptcha)
                                        msgCaptcha.style.display = "none";
                                },
                                validateEmail: function(email) {
                                    var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                    return re.test(email);
                                },
                                prepareDate: function(date, format) {
                                    var newDate, time;
                                    format = format.substr(0, 10).replace("/", "").replace("/", "").replace("-", "").replace("-", "");
                                    time = date.substr(10, 15);

                                    if (format == "DDMMAAAA") {
                                        newDate = date[6] + date[7] + date[8] + date[9] + "-" + date[3] + date[4] + "-" + date[0] + date[1];
                                    } else if (format == "MMDDAAAA") {
                                        newDate = date[6] + date[7] + date[8] + date[9] + "-" + date[0] + date[1] + "-" + date[3] + date[4];
                                    } else if (format == "AAAAMMDD") {
                                        newDate = date[0] + date[1] + date[2] + date[3] + "-" + date[5] + date[6] + "-" + date[8] + date[9];
                                    }

                                    return newDate + time;
                                },
                                existDate: function(date, time) {
                                    if (time) {
                                        if (date.length != 16) {
                                            return false;
                                        }
                                    } else if (!time) {
                                        if (date.length != 10) {
                                            return false;
                                        }
                                        date += " 00:00";
                                    }

                                    var NEWDATE = new Date(date.replace("-", "/").replace("-", "/"));
                                    var strNewdate;

                                    var y = NEWDATE.getFullYear().toString();
                                    var m = (NEWDATE.getMonth() + 1).toString();
                                    var d = NEWDATE.getDate().toString();
                                    var h = NEWDATE.getHours().toString();
                                    var min = NEWDATE.getMinutes().toString();
                                    strNewdate = y + "-" + (m[1] ? m : "0" + m[0]) + "-" + (d[1] ? d : "0" + d[0]) + " " + (h[1] ? h : "0" + h[0]) + ":" + (min[1] ? min : "0" + min[0]);

                                    if (date != strNewdate) {
                                        return false;
                                    }

                                    return true;
                                },
                                addClass: function(classname, element) {
                                    var cn = element.className;
                                    if (cn.indexOf(classname) != -1) {
                                        return;
                                    }
                                    if (cn != "") {
                                        classname = " " + classname;
                                    }
                                    element.className = cn + classname;
                                },
                                removeClass: function(classname, element) {
                                    var cn = element.className;
                                    var rxp = new RegExp("\\s?\\b" + classname + "\\b", "g");
                                    cn = cn.replace(rxp, "");
                                    element.className = cn;
                                },
                                //funcao do google faz o serialize estilo JQuery
                                serialize: function(form) {
                                    if (!form || form.nodeName !== "FORM") {
                                        return
                                    }
                                    var i, j, q = [];
                                    for (i = form.elements.length - 1; i >= 0; i = i - 1) {
                                        if (form.elements[i].name === "") {
                                            continue
                                        }
                                        switch (form.elements[i].nodeName) {
                                            case "INPUT":
                                                switch (form.elements[i].type) {
                                                    case "text":
                                                    case "hidden":
                                                    case "password":
                                                    case "button":
                                                    case "reset":
                                                    case "submit":
                                                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                                        break;
                                                    case "checkbox":
                                                    case "radio":
                                                        if (form.elements[i].checked) {
                                                            q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value))
                                                        }
                                                        break;
                                                    case "file":
                                                        break
                                                }
                                                break;
                                            case "TEXTAREA":
                                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                                break;
                                            case "SELECT":
                                                switch (form.elements[i].type) {
                                                    case "select-one":
                                                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                                        break;
                                                    case "select-multiple":
                                                        for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
                                                            if (form.elements[i].options[j].selected) {
                                                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value))
                                                            }
                                                        }
                                                        break
                                                }
                                                break;
                                            case "BUTTON":
                                                switch (form.elements[i].type) {
                                                    case "reset":
                                                    case "submit":
                                                    case "button":
                                                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                                        break
                                                }
                                                break
                                        }
                                    }
                                    return q.join("&")
                                },
                            };
                        }

                        //
                        if (document.readyState === "complete") {
                            dinForms.onLoad();
                        } else {
                            if (window.attachEvent) {
                                window.attachEvent("load", dinForms.onLoad);
                            } else {
                                window.addEventListener("load", dinForms.onLoad);
                            }
                        }
                    </script>

                </div>
                <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>