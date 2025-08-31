document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('table.obj-count-table tbody tr').forEach(tr => {
    const tds = tr.querySelectorAll('td');
    tds.forEach(td => {
      if (!td.classList.contains('cell-hidden')) {
        td.addEventListener('click', function(e) {
          e.stopPropagation();
          tds.forEach(cell => {
            cell.classList.toggle('obj-count-selected');
          });
        });
      }
    });
  });
});
