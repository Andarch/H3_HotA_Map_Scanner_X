document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('table.obj-count-table tbody tr').forEach(tr => {
    tr.addEventListener('click', function() {
      tr.classList.toggle('obj-count-selected');
    });
  });
});
