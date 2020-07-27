/*
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @package   Nezuko - Content Management System
 * @copyright Copyright (c) 2020, Panji Setya Nur Prawira
 */

$(document).ready(function () {
  // Logout form
  $('.logout').on('click', function (e) {
    e.preventDefault();

    axios({
      method: 'POST',
      url: $(this).attr('href'),
    }).then(response => {
      location.reload();
    });
  });
});