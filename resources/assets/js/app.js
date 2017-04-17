
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.delete').click(function (e) {
    e.preventDefault();
    obj = $(this);

    route = obj.attr('href');

    if(route)
        if(confirm("Are you sure you want to delete this record?"))
            $.ajax({
                url: route,
                type: 'post',
                data: {_method: 'delete'},
                success: function (msg) {
                    if(msg == 'true')
                        obj.closest('tr').fadeOut(300);
                    else
                        alert('Ops, Something happened. Try again later.');
                },
                fail: function (msg) {
                    console.log(msg);
                }
            });

});