<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/HOR.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cambria:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>Document</title>

    <script type="text/javascript" src="<?= base_url('/public/assets/js/senate.js') ?>"></script>
</head>

<body>
    <nav class="navigation-menu">
        <div class="navigation-menu__overlay" onclick="toggleMenuClicked()"></div>
        <button type="button" class="hamburger-menu" onclick="toggleMenuClicked()">
            <span class="material-icons" id="open-icon">menu</span>
            <span class="material-icons" id="close-icon">close</span>
        </button>
        <img class="site-identity-logo"
            src="https://upload.wikimedia.org/wikipedia/commons/7/75/Seal_of_the_Senate_of_Nigeria.svg" alt="senatelogo"
            width="110px" height="50px">
        <section class="navigation-menu__labels">
            <a href="<?= base_url('') ?>"><button type="button">Home</button></a>
            <a href="<?= base_url('blog') ?>"><button type="button">Blog/News</button></a>
            <a href="<?= base_url('about-us') ?>"><button type="button">About Us</button></a>
            <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
                <a class="nav-link" href="<?= base_url('logout') ?>"><button type="button">Logout</button></a>
            <?php else: ?>
                <a href="<?= base_url('register') ?>"><button type="button">Sign Up</button></a>
                <a href="<?= base_url('login') ?>"><button type="button">Log In</button></a>
            <?php endif; ?>
            <a href="<?= base_url('postblogpg') ?>"><button type="button">Report</button></a>
        </section>
    </nav>


    <form class="awesome-form" action="<?= base_url('hor/submitHor') ?>" method="post">

    <!-- Error Message -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

        <div class="input-group">
            <h1>Know your house of representatives:</h1>

            <select id="state" name="state" required>
                <option value="">Select State</option>
                <?php foreach ($states as $state): ?>
                    <option value="<?= $state['state'] ?>"><?= $state['state'] ?></option>
                <?php endforeach; ?>
            </select>
            <label>Select State:</label>

            <select id="constituency" name="constituency" required>
                <option value="">Select Constituency</option>
            </select>
            <label>Select Constituency:</label>

            <button id="submit" type="submit">
                <span class="icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                <span class="text">Submit</span>
            </button>
        </div>
    </form>

    <script>
        // AJAX call to populate constituencies based on selected state
        document.getElementById('state').addEventListener('change', function () {
            const state = this.value;
            const constituencySelect = document.getElementById('constituency');

            if (state) {
                fetch('<?= base_url('hor/getHorConstituencies') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'state=' + encodeURIComponent(state)
                })
                    .then(response => response.json())
                    .then(data => {
                        constituencySelect.innerHTML = '<option value="">Select Constituency</option>';
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.constituencies;
                            option.textContent = item.constituencies;
                            constituencySelect.appendChild(option);
                        });
                    });
            } else {
                constituencySelect.innerHTML = '<option value="">Select Constituency</option>';
            }
        });
    </script>



    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <footer class="footer">
        <p>Website copyright &#169; 2024</p>
    </footer>

</body>

</html>