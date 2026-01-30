document.addEventListener('DOMContentLoaded', function() {
  // Define all tables and their buttons
  const tables = [
    { button: 'treasurechests-table-button', table: 'treasurechests-table' },
    { button: 'resources-table-button', table: 'resources-table' },
    { button: 'campfires-table-button', table: 'campfires-table' },
    { button: 'ancientlamps-table-button', table: 'ancientlamps-table' }
  ];

  // Add click event listener to each button
  tables.forEach(current => {
    const button = document.getElementById(current.button);
    const table = document.getElementById(current.table);

    button.addEventListener('click', function() {
      // Show the clicked table and hide its button
      table.style.display = 'block';
      button.style.display = 'none';

      // Hide all other tables and show their buttons
      tables.forEach(other => {
        if (other !== current) {
          document.getElementById(other.table).style.display = 'none';
          document.getElementById(other.button).style.display = 'block';
        }
      });
    });
  });
});
