var express = require('express');
var app = module.exports = express();
var env = process.env.NODE_ENV || 'dev';
var config = require('../../config')();



// send HTML on any route matching
app.get('/', renderTemplate('home', 'amp-home-page'));
app.get('/styleguide', renderTemplate('styleguide'));
app.get('/mission', renderTemplate('mission'));
app.get('/charities', renderTemplate('charities'));
app.get('/invite-friends', renderTemplate('invite-friends'));
// app.get('/articles', renderTemplate('articles'));
app.get('/resources', renderTemplate('resources'));
app.get('/why-amplify', renderTemplate('why-amplify', 'amp-why-page'));
app.get('/business', renderTemplate('business'));
app.get('/legal', renderTemplate('legal'));
app.get('/articles', renderTemplate('news'));
app.get('/vision', renderTemplate('vision'));
app.get('/recipe-banana-hemp', renderTemplate('recipe-banana-hemp'));
app.get('/article', renderTemplate('article'));
app.get('/supplements', renderTemplate('supplements'));


app.get('/terms', renderTemplate('terms'));
app.get('/privacy', renderTemplate('privacy'));
app.get('/cookies', renderTemplate('cookies'));
app.get('/support', renderTemplate('support'));
app.get('/developers', renderTemplate('developers'));


function renderTemplate(page, bodyClass) {
  return function(req, res){
    // send minified assets in production & test
    var js = config.is_minified
         ? ['vendor.min.js', 'home/build.min.js']
         : ['vendor.js', 'home/build.js'];

    res.render(__dirname + '/pages/' + page + '.jade', {
      js: js,
      css: ['housestyle.css', 'home/build.css'],
      bodyClass: bodyClass || 'amp-home-page',
      conf: {
        amp_api: config.amp_api,
        base_uri: config.base_uri,
        fb_app_id: config.fb_app_id,
        ga_code: config.ga_code
      },
      asset_path: config.asset_path
    });
  }
}
