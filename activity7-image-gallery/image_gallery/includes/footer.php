
  </main>
  <footer class="mt-5"></footer>
  <script type="text/javascript">
    const updateLabel = () => {
      document.querySelector('label.custom-file-label').innerHTML = document.querySelector('input.custom-file-input').value.replace('C:\\fakepath\\', '');
    }
    const editSelectedItem = () => {
      const selectElement = document.getElementById('editselect');
      const editItemUrl = selectElement.options[selectElement.selectedIndex].value;
      if (editItemUrl) {
        location.href = editItemUrl;
      }
    }
  </script>
</body>
</html>