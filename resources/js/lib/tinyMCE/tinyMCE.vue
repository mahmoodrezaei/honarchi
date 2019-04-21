<template>
  <div>
    <TinyMCE_Editor :init="init" :value="value" @input="update"/>
  </div>
</template>

<script>
import TinyMCE_Editor from "./tinyMCE.js";

let init_props = function() {
  return {
    skin: false,
    directionality: "rtl",
    language: "fa_IR",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar:
      "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false
  };
};

export default {
  name: "TinyMCE",
  components: {
    TinyMCE_Editor
  },
  props: {
    init: {
      type: Object,
      default: init_props
    },
    value: {
      type: String,
      default: ""
    }
  },
  methods: {
    update(newValue) {
      this.$emit("input", newValue);
    }
  }
};
</script>
