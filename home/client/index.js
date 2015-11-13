
var FacebookAuth = require('../../shared/facebook/auth.js');

window.jQuery = window.$ = require('jquery');
require('bootstrap');

// note: this is called globally for every page in the home section;
// required for facebook login
FacebookAuth.init();

window.fbLogin = function() {
  FacebookAuth.login(function(token) {
    document.location.href = '/login?fb_token=' + token;
  });
};




(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

if (conf && conf.ga_code) {
  ga('create', conf.ga_code, 'auto');
  ga('send', 'pageview');
}
