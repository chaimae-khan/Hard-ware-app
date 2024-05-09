@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
                <form class="form" method="POST" action="{{route('cart.order')}}">
                    @csrf
                    <div class="row"> 
                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Prénom<span>*</span></label>
                                            <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}">
                                            @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nom<span>*</span></label>
                                            <input type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                            @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Adresse e-mail<span>*</span></label>
                                            <input type="email" name="email" placeholder="" value="{{old('email')}}">
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Numéro de téléphone <span>*</span></label>
                                            <input type="number" name="phone" placeholder="" required value="{{old('phone')}}">
                                            @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Pays<span>*</span></label>
                                            <select name="country" id="country">
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Îles Åland</option>
                                                <option value="AL">Albanie</option>
                                                <option value="DZ">Algérie</option>
                                                <option value="AS">Samoa américaines</option>
                                                <option value="AD">Andorre</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctique</option>
                                                <option value="AG">Antigua-et-Barbuda</option>
                                                <option value="AR">Argentine</option>
                                                <option value="AM">Arménie</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australie</option>
                                                <option value="AT">Autriche</option>
                                                <option value="AZ">Azerbaïdjan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahreïn</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbade</option>
                                                <option value="BY">Bélarus</option>
                                                <option value="BE">Belgique</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Bénin</option>
                                                <option value="BM">Bermudes</option>
                                                <option value="BT">Bhoutan</option>
                                                <option value="BO">Bolivie</option>
                                                <option value="BA">Bosnie-Herzégovine</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Île Bouvet</option>
                                                <option value="BR">Brésil</option>
                                                <option value="IO">Territoire britannique de l'océan Indien</option>
                                                <option value="VG">Îles Vierges britanniques</option>
                                                <option value="BN">Brunéi</option>
                                                <option value="BG">Bulgarie</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodge</option>
                                                <option value="CM">Cameroun</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cap-Vert</option>
                                                <option value="KY">Îles Caïmans</option>
                                                <option value="CF">République centrafricaine</option>
                                                <option value="TD">Tchad</option>
                                                <option value="CL">Chili</option>
                                                <option value="CN">Chine</option>
                                                <option value="CX">Île Christmas</option>
                                                <option value="CC">Îles Cocos [Keeling]</option>
                                                <option value="CO">Colombie</option>
                                                <option value="KM">Comores</option>
                                                <option value="CG">Congo - Brazzaville</option>
                                                <option value="CD">Congo - Kinshasa</option>
                                                <option value="CK">Îles Cook</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d’Ivoire</option>
                                                <option value="HR">Croatie</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CY">Chypre</option>
                                                <option value="CZ">République tchèque</option>
                                                <option value="DK">Danemark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominique</option>
                                                <option value="DO">République dominicaine</option>
                                                <option value="EC">Équateur</option>
                                                <option value="EG">Égypte</option>
                                                <option value="SV">Salvador</option>
                                                <option value="GQ">Guinée équatoriale</option>
                                                <option value="ER">Érythrée</option>
                                                <option value="EE">Estonie</option>
                                                <option value="ET">Éthiopie</option>
                                                <option value="FK">Îles Falkland</option>
                                                <option value="FO">Îles Féroé</option>
                                                <option value="FJ">Fidji</option>
                                                <option value="FI">Finlande</option>
                                                <option value="FR">France</option>
                                                <option value="GF">Guyane française</option>
                                                <option value="PF">Polynésie française</option>
                                                <option value="TF">Terres australes françaises</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambie</option>
                                                <option value="GE">Géorgie</option>
                                                <option value="DE">Allemagne</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Grèce</option>
                                                <option value="GL">Groenland</option>
                                                <option value="GD">Grenade</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernesey</option>
                                                <option value="GN">Guinée</option>
                                                <option value="GW">Guinée-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haïti</option>
                                                <option value="HM">Île Heard et îles McDonald</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">R.A.S. chinoise de Hong Kong</option>
                                                <option value="HU">Hongrie</option>
                                                <option value="IS">Islande</option>
                                                <option value="IN">Inde</option>
                                                <option value="ID">Indonésie</option>
                                                <option value="IR">Iran</option>
                                                <option value="IQ">Irak</option>
                                                <option value="IE">Irlande</option>
                                                <option value="IM">Île de Man</option>
                                                <option value="IL">Israël</option>
                                                <option value="IT">Italie</option>
                                                <option value="JM">Jamaïque</option>
                                                <option value="JP">Japon</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordanie</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KW">Koweït</option>
                                                <option value="KG">Kirghizistan</option>
                                                <option value="LA">Laos</option>
                                                <option value="LV">Lettonie</option>
                                                <option value="LB">Liban</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Libéria</option>
                                                <option value="LY">Libye</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lituanie</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">R.A.S. chinoise de Macao</option>
                                                <option value="MK">Macédoine</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaisie</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malte</option>
                                                <option value="MH">Îles Marshall</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritanie</option>
                                                <option value="MU">Maurice</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexique</option>
                                                <option value="FM">Micronésie</option>
                                                <option value="MD">Moldavie</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolie</option>
                                                <option value="ME">Monténégro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Maroc</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar [Birmanie]</option>
                                                <option value="NA">Namibie</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP" selected="selected">Népal</option>
                                                <option value="NL">Pays-Bas</option>
                                                <option value="AN">Antilles néerlandaises</option>
                                                <option value="NC">Nouvelle-Calédonie</option>
                                                <option value="NZ">Nouvelle-Zélande</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Île Norfolk</option>
                                                <option value="MP">Îles Mariannes du Nord</option>
                                                <option value="KP">Corée du Nord</option>
                                                <option value="NO">Norvège</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palaos</option>
                                                <option value="PS">Territoires palestiniens</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papouasie-Nouvelle-Guinée</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Pérou</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Îles Pitcairn</option>
                                                <option value="PL">Pologne</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Porto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">La Réunion</option>
                                                <option value="RO">Roumanie</option>
                                                <option value="RU">Russie</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint-Barthélemy</option>
                                                <option value="SH">Sainte-Hélène</option>
                                                <option value="KN">Saint-Christophe-et-Niévès</option>
                                                <option value="LC">Sainte-Lucie</option>
                                                <option value="MF">Saint-Martin</option>
                                                <option value="PM">Saint-Pierre-et-Miquelon</option>
                                                <option value="VC">Saint-Vincent-et-les-Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">Saint-Marin</option>
                                                <option value="ST">São Tomé-et-Príncipe</option>
                                                <option value="SA">Arabie saoudite</option>
                                                <option value="SN">Sénégal</option>
                                                <option value="RS">Serbie</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapour</option>
                                                <option value="SK">Slovaquie</option>
                                                <option value="SI">Slovénie</option>
                                                <option value="SB">Îles Salomon</option>
                                                <option value="SO">Somalie</option>
                                                <option value="ZA">Afrique du Sud</option>
                                                <option value="GS">Géorgie du Sud et les îles Sandwich du Sud</option>
                                                <option value="KR">Corée du Sud</option>
                                                <option value="ES">Espagne</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Soudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard et Île Jan Mayen</option>
                                                <option value="SZ">Eswatini</option>
                                                <option value="SE">Suède</option>
                                                <option value="CH">Suisse</option>
                                                <option value="SY">Syrie</option>
                                                <option value="TW">Taïwan</option>
                                                <option value="TJ">Tadjikistan</option>
                                                <option value="TZ">Tanzanie</option>
                                                <option value="TH">Thaïlande</option>
                                                <option value="TL">Timor oriental</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinité-et-Tobago</option>
                                                <option value="TN">Tunisie</option>
                                                <option value="TR">Turquie</option>
                                                <option value="TM">Turkménistan</option>
                                                <option value="TC">Îles Turks et Caïques</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Ouganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">Émirats arabes unis</option>
                                                <option value="UK">Royaume-Uni</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UM">Îles mineures éloignées des États-Unis</option>
                                                <option value="VI">Îles Vierges des États-Unis</option>
                                                <option value="UZ">Ouzbékistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VA">Cité du Vatican</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Viêt Nam</option>
                                                <option value="WF">Wallis-et-Futuna</option>
                                                <option value="EH">Sahara occidental</option>
                                                <option value="YE">Yémen</option>
                                                <option value="ZM">Zambie</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Ligne d'adresse 1<span>*</span></label>
                                            <input type="text" name="address1" placeholder="" value="{{old('address1')}}">
                                            @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Ligne d'adresse 2</label>
                                            <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                            @error('address2')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Code postal</label>
                                            <input type="text" name="post_code" placeholder="" value="{{old('post_code')}}">
                                            @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--/ Fin Formulaire -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <!-- Widget Commande -->
                                <div class="single-widget">
                                    <h2>TOTAL DU PANIER</h2>
                                    <div class="content">
                                        <ul>
										    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Sous-total du panier<span>${{number_format(Helper::totalCartPrice(),2)}}</span></li>
                                            <li class="shipping">
                                                Frais de port
                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                    <select name="shipping" class="nice-select">
                                                        <option value="">Sélectionnez votre adresse</option>
                                                        @foreach(Helper::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @else 
                                                    <span>Gratuit</span>
                                                @endif
                                            </li>
                                            
                                            @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">Vous économisez<span>${{number_format(session('coupon')['value'],2)}}</span></li>
                                            @endif
                                            @php
                                                $total_amount=Helper::totalCartPrice();
                                                if(session('coupon')){
                                                    $total_amount=$total_amount-session('coupon')['value'];
                                                }
                                            @endphp
                                            @if(session('coupon'))
                                                <li class="last"  id="order_total_price">Total<span>${{number_format($total_amount,2)}}</span></li>
                                            @else
                                                <li class="last"  id="order_total_price">Total<span>${{number_format($total_amount,2)}}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!--/ Fin Widget Commande -->
                                <!-- Widget Commande -->
                                <div class="single-widget">
                                    <h2>Paiements</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                            <form-group>
                                                <input name="payment_method"  type="radio" value="cod"> <label> Paiement à la livraison</label><br>
                                                <input name="payment_method"  type="radio" value="paypal"> <label> PayPal</label> 
                                            </form-group>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--/ Fin Widget Commande -->
                                <!-- Widget Méthode de Paiement -->
                                <div class="single-widget payement">
                                    <div class="content">
                                        <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                    </div>
                                </div>
                                <!--/ Fin Widget Méthode de Paiement -->
                                <!-- Widget Bouton -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit" class="btn">passer à la caisse</button>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Fin Widget Bouton -->
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
    <!--/ Fin Paiement -->
    
    <!-- Start Services de la Boutique -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Début Service Unique -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Livraison gratuite</h4>
                        <p>Commandes de plus de 1000dh</p>
                    </div>
                    <!-- Fin Service Unique -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Début du service unique -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Retour gratuit</h4>
                        <p>Retours dans les 30 jours</p>
                    </div>
                    <!-- Fin du service unique -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Début du service unique -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Paiement sécurisé</h4>
                        <p>Paiement 100% sécurisé</p>
                    </div>
                    <!-- Fin du service unique -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Début du service unique -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Meilleur prix</h4>
                        <p>Prix garanti</p>
                    </div>
                    <!-- Fin du service unique -->
                </div>
            </div>
        </div>
    </section>
    <!-- Fin des services de la boutique -->
    
    <!-- Début de la newsletter de la boutique -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Début de la newsletter intérieure -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p>Inscrivez-vous à notre newsletter et obtenez <span>10%</span> de réduction sur votre premier achat</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Votre adresse e-mail" required="" type="email">
                                <button class="btn">S'abonner</button>
                            </form>
                        </div>
                        <!-- Fin de la newsletter intérieure -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush