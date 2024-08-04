<nav>
  <ul>
    <li><b><a href="/" class="contrast">Home</a></b></li>
  </ul>
  <ul>
    <li><a href="/signup">Sign up</a></li>
    <li><button id="sigin">Sign in</button></li>
  </ul>
</nav>

<dialog id="sigindialog">
  <div>
    <form action="/login" method="post">
      <fieldset role="group">
        <input type="email" name="email" placeholder="Email" aria-label="Email" autocomplete="email" />
        <input type="password" name="password" placeholder="Password" aria-label="Password" autocomplete="password" />
        <input type="submit" value="Log in" />
      </fieldset>
    </form>
    <button id="closelogin" class="secondary">Close</button>
  </div>

</dialog>


<script>
  const signin = document.querySelector('#sigin');
  const sigindialog = document.querySelector('#sigindialog');
  const closelogin = document.querySelector('#closelogin');

  signin.addEventListener('click', (event) => {
    sigindialog.showModal();
  });

  closelogin.addEventListener('click', (event) => {
    sigindialog.close();
  });
</script>