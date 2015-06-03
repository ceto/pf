<aside id="contactblock" class="contactblock<?php echo is_singular('apartment')?' collapse':''; ?>">
	<div class="wrapper wrapper--normal">
  <div class="fogo">

    <div class="contactblock__form">
      <header class="form__header">
        <h2 class="form__title lineas">Meld din interesse!</h2>
      </header>
      <form action="mailer.php" id="contactform" class="contactform" method="post">
        <div class="formitem">
          <input type="text" id="form__name" name="form__name" placeholder="ditt navn (obligatorisk)">
          <label for="form__name">navn</label>
        </div>
        <div class="formitem">
          <input type="email" id="form__email" name="form__email" placeholder="e-post (obligatorisk)">
          <label for="form__email">e-post</label>
        </div>
        <div class="formitem">
          <input type="tel" id="form__tel" name="form__tel" placeholder="telefonnummer">
          <label for="form__tel">telefonnummer</label>
        </div>
        <div class="formitem">
          <textarea name="form__message" id="form__message" placeholder="melding" cols="30" rows="5"></textarea>
          <label for="form__message">meldig</label>
        </div>
        <div class="formactions">
        	<div class="form__response" id="form__response"></div>
          <input type="hidden" name="form__human" value="2">
          <input type="hidden" name="submitted" value="1">
          <input type="submit" class="submitbtn" value="Send">
        </div>
      </form>
    </div>

    <div class="contactblock__members">
      <div class="member">
        <span class="member__name">Christian Fr. Foss</span>
        <span class="member__title">Prosjektmegler</span>
        <span class="member__tel">T: <a href="tel:90 17 35 34">90 17 35 34</a></span>
        <span class="member__email">E: <a href="mailto:cff@eiendomsmegler1.no">cff@eiendomsmegler1.no</a></span>
      </div>
      <div class="member">
        <span class="member__name">Olav Aune</span>
        <span class="member__title">Prosjektmegler</span>
        <span class="member__tel">T: <a href="tel:41 65 02 70">41 65 02 70</a></span>   
        <span class="member__email">E: <a href="mailto:oa@eiendomsmegler1.no">oa@eiendomsmegler1.no</a></span>
      </div>
      <div class="member">
        <span class="member__name">Svein Gundersen</span>
        <span class="member__title">Prosjektmegler</span>
        <span class="member__tel">T: <a href="tel:48 09 96 80">48 09 96 80</a></span>
        <span class="member__email">E: <a href="mailto:sg@eiendomsmegler1.no">sg@eiendomsmegler1.no</a></span>
      </div>
    </div>
	

    <footer class="cf_footer">
      <div class="cf_footer__brands">
        <a href="#" class="fbrand">
          <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/eind.png" alt="EiendomsMegler">
        </a>
        <a href="#" class="fbrand fbrand--pf">
          <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="PengeskapsFabrikken">
        </a>
        <a href="#" class="fbrand">
          <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/urblogo.png" alt="urbanium">
        </a>
      </div>
    </footer>

	</div>



	</div>
</aside>