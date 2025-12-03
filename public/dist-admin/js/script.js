(() => {
  'use strict'

// Sidebar Menu
const hamburger = document.querySelector(".toggle-btn");
const toggler = document.querySelector("#icon");
// const content = document.querySelector('#main-content');

hamburger.addEventListener("click", function(){
  document.querySelector('#topnav').classList.toggle("expanded");
  document.querySelector("#sidebar").classList.toggle("expand");
  document.querySelector('#main-content').classList.toggle("expanded");
  document.querySelector('#footer').classList.toggle("expanded");
  toggler.classList.toggle("bi-chevron-double-left");
  toggler.classList.toggle("bi-chevron-double-right");
});

// Top Navbar
const topNav = document.querySelector(".toggle-nav-btn");
const togglerNav = document.querySelector("#nav-icon");

topNav.addEventListener("click", function(){
  document.querySelector("#topnav").classList.toggle("show");
  togglerNav.classList.toggle("bi-chevron-down");
  togglerNav.classList.toggle("bi-chevron-up");
});

// Dropdown Menu
document.addEventListener("DOMContentLoaded", function () {
    const currentPage = window.location.pathname.split("/").pop(); // e.g. login.html

    // সব sidebar-link এর মধ্যে লুপ
    document.querySelectorAll("#sidebar .sidebar-link").forEach(link => {
        const linkPage = link.getAttribute("href");

        // যদি current পাতার সঙ্গে মিলে যায়
        if (linkPage === currentPage) {
            link.classList.add("active");

            // যদি এটা dropdown এর ভেতরে থাকে → তাহলে parent dropdown ওপেন করবে
            const parentCollapse = link.closest(".collapse");
            if (parentCollapse) {
                parentCollapse.classList.add("show");

                // parent <a ... has-dropdown> element active হবে
                const parentLink = parentCollapse.previousElementSibling;
                if (parentLink) {
                    parentLink.classList.add("active");
                    parentLink.setAttribute("aria-expanded", "true");
                }
            }
        }
    });
});

// Chart JS
const chartCanvas = document.getElementById('myChart');
if (chartCanvas)
{
  // const ctx = chartCanvas.getContext('2d');
  new Chart(chartCanvas, {
    type: 'bar',
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [
        {
          label: "Income",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2578]
        }, {
          label: "Expense",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Chart Title', // Chart Title Change Here
          color: '#fff'
        }
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Year',
            color: '#911',
            font: {
              family: 'Comic Sans MS',
              size: 20,
              weight: 'bold',
              lineHeight: 1.2,
            },
            padding: {top: 5, left: 0, right: 0, bottom: 5}
          },
          grid: {
            color: 'rgba(200, 200, 200, 0.5)', // Color of the x-axis grid lines
            borderColor: 'red', // Color of the x-axis border
            borderWidth: 1 // Width of the x-axis border
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Value',
            color: '#911',
            font: {
              family: 'Comic Sans MS',
              size: 20,
              weight: 'bold',
              lineHeight: 1.2,
            },
            padding: {top: 10, left: 0, right: 0, bottom: 0}
          },
          grid: {
            color: 'rgba(150, 150, 150, 0.7)', // Color of the y-axis grid lines
            borderColor: 'blue', // Color of the y-axis border
            borderWidth: 1 // Width of the y-axis border
          }
        }
      }
    }
  });
}

// form validation
// Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      const summernoteContent = $('#summernote').summernote('isEmpty');
      if (!form.checkValidity() && summernoteContent) {
        event.preventDefault();
        event.stopPropagation();
        
        $('#summernote').next('.note-editor').addClass('is-invalid');
      } else {
              $('#summernote').next('.note-editor').removeClass('is-invalid');
          }

      form.classList.add('was-validated')
    }, false)
  });

  // Print Invoice
  document.addEventListener('DOMContentLoaded', function () {

    // print button select করা
    // const printBtn = document.getElementById('printBtn');
    document.getElementById('printBtn').addEventListener('click', printSpecificArea);

    // বাটনে ক্লিক ইভেন্ট যোগ করা
    // printBtn.addEventListener('click', function () {
    //   printInvoice();
    // });

  });

  // function printInvoice(){
  // const invoice = document.getElementById('print-area').outerHTML;
  // window.print();
  // const newWin = window.open('', '', 'width=900,height=650');
  // newWin.document.open(`
  //   <html>
  //     <head>
  //       <title>Print Invoice</title>
  //       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  //     </head>
  //     <body>${invoice}</body>
  //     <script>
  //       window.onload = function() {
  //         window.print();
  //         window.close();
  //       };
  //     <\/script>
  //   </html>
  // `);
  // newWin.document.close();
  // }

  function printSpecificArea() {
    // নির্দিষ্ট অংশ সিলেক্ট
    const printContent = document.getElementById('printArea').outerHTML;

    // নতুন উইন্ডো ওপেন করা
    const printWindow = window.open('', '', 'width=900,height=650');

    // Create <html> structure
    const html = `
      <html>
        <head>
          <title>Print Invoice</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
          <style>
            @page { size: A4; margin: 15px; }
            body { -webkit-print-color-adjust: exact; margin: 0; padding: 5px; }
            p {margin: 0;}
            .no-print { display: none !important; } /* hide elements with this class when printing */
          </style>
        </head>
        <body>${printContent}</body>
      </html>
    `;

    // নতুন উইন্ডোতে HTML বসানো (modern way)
    const doc = printWindow.document;
    doc.open();
    doc.write(html); // ← এখানে আবার safe ভাবে write করা হচ্ছে (নিরাপদ কারণ নতুন উইন্ডো ফাঁকা)
    doc.close();

    // Wait for content to load, then print
    printWindow.onload = () => {
      printWindow.focus();
      printWindow.print();
      printWindow.close();
    };
  }

  // Data Table for Agent All Property
  new DataTable('#adminPackages', {
    pagingType: "simple_numbers",
     language: {
        lengthMenu: "Show _MENU_ Entries Per Page",
        info: "Showing _START_ to _END_ of _TOTAL_ Entries",
        paginate: {
            // first: "« First",
            previous: "Previous",
            next: "Next",
            // last: "Last »"
        }
    },
    layout: {
      topStart: {
        pageLength: {
            menu: [ 10, 20, 50, 100 ]
        }
      },
      topEnd: {
            search: {
                placeholder: 'Type here to search'
            }
        }
    }
  });
})()