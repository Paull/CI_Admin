{% extends "welcome/layout.tpl" %}

  {% set site_title='sign in' %}
  {% set body_class='page-login layout-full page-dark' %}

  {% block styles %}
    <link rel="stylesheet" href="{$template.assets}examples/css/pages/login.css">
  {% endblock %}

  {% block scripts %}
    <script src="{$template.assets}vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="{$template.assets}js/components/jquery-placeholder.js"></script>
    <script src="{$template.assets}js/components/material.js"></script>
  {% endblock %}


{% block content %}
<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
  <div class="page-content vertical-align-middle">
    <div class="brand">
      <img class="brand-img" src="{$template.assets}/images/logo.png" alt="...">
      <h2 class="brand-text">CI_Admin</h2>
    </div>
    <p>Sign into your pages account</p>
    <form method="post" action="login.html" autocomplete="off">
      <div class="form-group form-material floating">
        <input type="text" class="form-control empty" id="inputName" name="name">
        <label class="floating-label" for="inputName">Name</label>
      </div>
      <div class="form-group form-material floating">
        <input type="email" class="form-control empty" id="inputEmail" name="email">
        <label class="floating-label" for="inputEmail">Email</label>
      </div>
      <div class="form-group form-material floating">
        <input type="password" class="form-control empty" id="inputPassword" name="password">
        <label class="floating-label" for="inputPassword">Password</label>
      </div>
      <div class="form-group clearfix">
        <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
          <input type="checkbox" id="inputCheckbox" name="remember">
          <label for="inputCheckbox">Remember me</label>
        </div>
        <a class="pull-right" href="iforget.html">Forgot password?</a>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
    <p>Still no account? Please go to <a href="signup.html">Sign up</a></p>

    <footer class="page-copyright page-copyright-inverse">
      <div class="social">
        <a href="javascript:void(0)">
          <i class="icon bd-twitter" aria-hidden="true"></i>
        </a>
        <a href="javascript:void(0)">
          <i class="icon bd-facebook" aria-hidden="true"></i>
        </a>
        <a href="javascript:void(0)">
          <i class="icon bd-dribbble" aria-hidden="true"></i>
        </a>
      </div>
    </footer>
  </div>
</div>
<!-- End Page -->
{% endblock %}
