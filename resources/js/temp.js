var FormRepeater = {
    init: function () {
        $("#m_repeater_1").repeater({
            initEmpty: !1, defaultValues: {"text-input": "foo"}, show: function () {
                $(this).slideDown()
            }, hide: function (e) {
                $(this).slideUp(e)
            }
        }), $("#m_repeater_2").repeater({
            initEmpty: !1, defaultValues: {"text-input": "foo"}, show: function () {
                $(this).slideDown()
            }, hide: function (e) {
                confirm("Are you sure you want to delete this element?") && $(this).slideUp(e)
            }
        }), $("#m_repeater_3").repeater({
            initEmpty: !1, defaultValues: {"text-input": "foo"}, show: function () {
                $(this).slideDown()
            }, hide: function (e) {
                confirm("Are you sure you want to delete this element?") && $(this).slideUp(e)
            }
        }), $("#m_repeater_4").repeater({
            initEmpty: !1, defaultValues: {"text-input": "foo"}, show: function () {
                $(this).slideDown()
            }, hide: function (e) {
                $(this).slideUp(e)
            }
        }), $("#m_repeater_5").repeater({
            initEmpty: !1, defaultValues: {"text-input": "foo"}, show: function () {
                $(this).slideDown()
            }, hide: function (e) {
                $(this).slideUp(e)
            }
        }), $("#m_repeater_6").repeater({
            initEmpty: !1, defaultValues: {"text-input": "foo"}, show: function () {
                $(this).slideDown()
            }, hide: function (e) {
                $(this).slideUp(e)
            }
        })
    }
};
jQuery(document).ready(function () {
    FormRepeater.init()
});

/*new Vue({
    el: '#app',
    data: {
        fields: [{ first: '',last: '' }],
    },
    created: function() {
    },
    methods: {
        AddField: function () {
            this.fields.push({ first: '',last: '' });
        }
    }
});

.border {
    border: 1px solid black;
    padding: 3px;
    margin-bottom: 5px;
}

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.14/vue.js"></script>
    <div id="app">
    <h1>Vue JS Multiple Fields Repeater</h1>
<div class="border" v-for="field in fields">
    <input v-model="field.first" placeholder="Enter First Name">
    <input v-model="field.last" placeholder="Enter Last Name">
    </div>
    <button @click="AddField">
    New Field
</button>
<pre>{{ $data | json }}</pre>
</div>*/
