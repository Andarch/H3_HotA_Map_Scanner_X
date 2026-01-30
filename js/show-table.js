document.addEventListener('DOMContentLoaded', function() {
  // Define all tables and their buttons for Page 1
  const tablesPage1 = [
    { button: 'treasurechests-table-button', table: 'treasurechests-table' },
    { button: 'resources-table-button', table: 'resources-table' },
    { button: 'campfires-table-button', table: 'campfires-table' },
    { button: 'ancientlamps-table-button', table: 'ancientlamps-table' }
  ];

  // Define all tables and their buttons for Page 2
  const tablesPage2 = [
    { button: 'flotsamjetsam-table-button', table: 'flotsamjetsam-table' },
    { button: 'seabarrels-table-button', table: 'seabarrels-table' },
    { button: 'seachests-table-button', table: 'seachests-table' },
    { button: 'vialsofmana-table-button', table: 'vialsofmana-table' }
  ];

  // Function to setup table toggle functionality
  function setupTableToggle(tables) {
    tables.forEach(current => {
      const button = document.getElementById(current.button);
      const table = document.getElementById(current.table);

      if (!button || !table) return; // Skip if elements don't exist on this page

      button.addEventListener('click', function() {
        // Show the clicked table and hide its button
        table.style.display = 'block';
        button.style.display = 'none';

        // Hide all other tables and show their buttons
        tables.forEach(other => {
          if (other !== current) {
            const otherTable = document.getElementById(other.table);
            const otherButton = document.getElementById(other.button);
            if (otherTable && otherButton) {
              otherTable.style.display = 'none';
              otherButton.style.display = 'block';
            }
          }
        });
      });
    });
  }

  // Setup both pages
  setupTableToggle(tablesPage1);
  setupTableToggle(tablesPage2);
});
