<template>
  <div>
    <TinyMCE_Editor :init="init" :value="value" @input="update"/>
  </div>
</template>

<script>
import TinyMCE_Editor from "../lib/tinyMCE/tinyMCE.js";

let editor_config = function() {
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
    relative_urls: false,
    file_browser_callback: function(field_name, url, type, win) {
      var x =
        window.innerWidth ||
        document.documentElement.clientWidth ||
        document.getElementsByTagName("body")[0].clientWidth;
      var y =
        window.innerHeight ||
        document.documentElement.clientHeight ||
        document.getElementsByTagName("body")[0].clientHeight;

      var cmsURL = "/admin/filemanager?field_name=" + field_name;
      if (type == "image") {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      window.tinyMCE.activeEditor.windowManager.open({
        file: cmsURL,
        title: "مدیریت فایل ها",
        width: x * 0.8,
        height: y * 0.8,
        resizable: "yes",
        close_previous: "no"
      });
    }
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
      default: editor_config
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
