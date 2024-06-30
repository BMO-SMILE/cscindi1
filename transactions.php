<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Transactions</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <h1>All Transactions</h1>
  <main>
    <section>
      <h3>Transactions</h3>
      <ul id="transactionList"></ul>
      <div id="status"></div>
    </section>
  </main>
  <script>
    const transactions = JSON.parse(localStorage.getItem("transactions")) || [];

    const formatter = new Intl.NumberFormat("en-US", {
      style: "currency",
      currency: "USD",
      signDisplay: "always",
    });

    const list = document.getElementById("transactionList");
    const status = document.getElementById("status");

    function renderList() {
      list.innerHTML = "";

      status.textContent = "";
      if (transactions.length === 0) {
        status.textContent = "No transactions.";
        return;
      }

      transactions.forEach(({ id, name, amount, date, type }) => {
        const sign = "income" === type ? 1 : -1;

        const li = document.createElement("li");

        li.innerHTML = `
          <div class="name">
            <h4>${name}</h4>
            <p>${new Date(date).toLocaleDateString()}</p>
          </div>

          <div class="amount ${type}">
            <span>${formatter.format(amount * sign)}</span>
          </div>
        `;

        list.appendChild(li);
      });
    }

    renderList();
  </script>
</body>
<main>
    <section>
      <h3>Transactions</h3>
      <ul id="transactionList"></ul>
      <div id="status"></div>
    </section>
  
    <!-- Back to Home Button -->
    <button class="back" onclick="window.location.href = 'index.php';">Back to Home</button>
  </main>
  
</html>
