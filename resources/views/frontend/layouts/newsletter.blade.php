<!-- Début de la Newsletter de la boutique -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Début de la partie interne de la Newsletter -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p>Abonnez-vous à notre newsletter et obtenez <span>10%</span> de réduction sur votre premier achat</p>
                        <form action="{{route('subscribe')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="Votre adresse e-mail" required="" type="email">
                            <button class="btn" type="submit">S'abonner</button>
                        </form>
                    </div>
                    <!-- Fin de la partie interne de la Newsletter -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin de la Newsletter de la boutique -->
