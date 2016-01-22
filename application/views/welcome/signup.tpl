{% extends "welcome/layout.tpl" %}

{% set site_title=lang('sign_up') %}
{% set body_class='page-register layout-full page-dark' %}

{% block styles %}
<link rel="stylesheet" href="{$template.assets}examples/css/pages/register.css">
{% endblock %}

{% block scripts %}
<script src="{$template.assets}vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="{$template.assets}js/components/jquery-placeholder.js"></script>
<script src="{$template.assets}js/components/animate-list.js"></script>
<script src="{$template.assets}js/components/material.js"></script>
{% endblock %}

{% block javascript %}
$("input[value='']:eq(0)").focus();
{% endblock %}

{% block content %}
<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">
  <div class="page-content vertical-align-middle">
    <div class="brand">
      <img class="brand-img" src="{$template.assets}images/logo.png" alt="logo">
      <h2 class="brand-text">{$ constant('SITENAME') }</h2>
    </div>
    <p>{$ lang('sign_up_description') }</p>
    {$ form_open('', 'id="register_form" autocomplete="off"') }
      <div class="form-group form-material floating{% if form_error('username') %} has-error{% endif %}">
        <input type="text" class="form-control{% if not set_value('username') %} empty{% endif %}" name="username" value="{$ set_value('username') }" tabindex="1">
        <label class="floating-label control-label">{$ lang('username_label') }</label>
      </div>
      {% if form_error('username') %}
      <div class="alert dark alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {$ form_error('username') }
      </div>
      {% endif %}
      <div class="form-group form-material floating{% if form_error('email') %} has-error{% endif %}">
        <input type="text" class="form-control{% if not set_value('email') %} empty{% endif %}" name="email" value="{$ set_value('email') }" tabindex="1">
        <label class="floating-label control-label">{$ lang('email_label') }</label>
      </div>
      {% if form_error('email') %}
      <div class="alert dark alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {$ form_error('email') }
      </div>
      {% endif %}
      <div class="form-group form-material floating{% if form_error('password1') %} has-error{% endif %}">
        <input type="password" class="form-control empty" name="password1" value="" tabindex="2">
        <label class="floating-label">{$ lang('password_label') }</label>
      </div>
      {% if form_error('password1') %}
      <div class="alert dark alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {$ form_error('password1') }
      </div>
      {% endif %}
      <div class="form-group form-material floating{% if form_error('password2') %} has-error{% endif %}">
        <input type="password" class="form-control empty" name="password2" value="" tabindex="2">
        <label class="floating-label">{$ lang('password_confirm_label') }</label>
      </div>
      {% if form_error('password2') %}
      <div class="alert dark alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {$ form_error('password2') }
      </div>
      {% endif %}
      <button type="submit" class="btn btn-primary btn-block">{$ lang('sign_up') }</button>
    </form>
    <p>{$ lang('sign_in_prefix') }<a href="{$ site_url('login') }" tabindex="5">{$ lang('sign_in') }</a></p>

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
