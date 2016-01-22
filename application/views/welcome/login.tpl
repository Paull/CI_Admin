{% extends "welcome/layout.tpl" %}

{% set site_title=lang('sign_in') %}
{% set body_class='page-login layout-full page-dark' %}

{% block styles %}
<link rel="stylesheet" href="{$template.assets}examples/css/pages/login.css">
<link rel="stylesheet" href="{$template.assets}vendor/formvalidation/formValidation.css">
{% endblock %}

{% block scripts %}
<script src="{$template.assets}vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="{$template.assets}js/components/jquery-placeholder.js"></script>
<script src="{$template.assets}js/components/material.js"></script>
<script src="{$template.assets}vendor/formvalidation/formValidation.min.js"></script>
<script src="{$template.assets}vendor/formvalidation/framework/bootstrap.min.js"></script>
{% endblock %}

{% block javascript %}
$("input[value='']:eq(0)").focus();
(function() {
$('#login_form').formValidation({
  framework: "bootstrap",
  button: {
    selector: '#submit',
    disabled: 'disabled'
  },
  icon: {
    valid: 'icon md-check',
    invalid: 'icon md-close'
  },
  fields: {
    username: {
      validators: {
        notEmpty: {
          message: 'Email or Username is required and cannot be empty'
        },
        stringLength: {
          min: 6,
          max: 30,
          message: 'The Email or Username must be more than 6 and less than 30 characters long'
        }
      }
    },
    password: {
      validators: {
        notEmpty: {
          message: 'The password is required and cannot be empty'
        },
        stringLength: {
          min: 6,
          max: 32,
          message: 'The password must be more than 6 and less than 32 characters long'
        }
      }
    }
  }
});
})();
{% endblock %}

{% block content %}
<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
  <div class="page-content vertical-align-middle">
    <div class="brand">
      <img class="brand-img" src="{$template.assets}images/logo.png" alt="logo">
      <h2 class="brand-text">{$ constant('SITENAME') }</h2>
    </div>
    <p>{$ lang('sign_in_description') }</p>
    {$ form_open('', 'id="login_form" autocomplete="off"') }
      <div class="form-group form-material floating{% if form_error('username') %} has-error{% endif %}">
        <input type="text" class="form-control{% if not set_value('username') %} empty{% endif %}" name="username" value="{$ set_value('username') }" tabindex="1">
        <label class="floating-label control-label">{$ lang('email_or_username_label') }</label>
      </div>
      {% if form_error('username') %}
      <div class="alert dark alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {$ form_error('username') }
      </div>
      {% endif %}
      <div class="form-group form-material floating{% if form_error('password') %} has-error{% endif %}">
        <input type="password" class="form-control empty" name="password" value="" tabindex="2">
        <label class="floating-label">{$ lang('password') }</label>
      </div>
      {% if form_error('password') %}
      <div class="alert dark alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {$ form_error('password') }
      </div>
      {% endif %}
      <div class="form-group clearfix">
        <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
          <input id="remember" type="checkbox" name="remember" tabindex="3" checked>
          <label for="remember">{$ lang('remember_me') }</label>
        </div>
        <a class="pull-right" href="{$ site_url('iforget') }" tabindex="6">{$ lang('forget_password') }</a>
      </div>
      <button type="submit" id="submit" class="btn btn-primary btn-block" tabindex="4">{$ lang('sign_in') }</button>
    </form>
    <p>{$ lang('sign_up_prefix') }<a href="{$ site_url('signup') }" tabindex="5">{$ lang('sign_up') }</a></p>

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
