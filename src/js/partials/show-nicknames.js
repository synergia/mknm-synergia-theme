// Pobieranie nicków z url i wyświetlanie ich koło ikon społecznościowych
// oraz wykorzystanie username'u githuba do wyświetlenia ostatnie aktywności
$('.memberInfo__social a').each(function(index) {
  var profile = $(this).attr('href');
  var github_profile = profile.substr(19);
  if (profile.indexOf('github') > -1) {
    $('a[data-github]').append(github_profile);
  }
  if (profile.indexOf('twitter') > -1) {
    $('a[data-twitter]').append(profile.substr(20));
  }
  if (profile.indexOf('facebook') > -1) {
    $('a[data-facebook]').append(profile.substr(25));
  }
});
