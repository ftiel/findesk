<form runat="server">
  <input accept="image/*" type='file' id="imgInps" />
  <img id="blah" src="#" alt="your image" />
</form>

<script>
  imgInps.onchange = evt => {
    const [file] = imgInps.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
</script>