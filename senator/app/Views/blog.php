<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/blog.css') ?>">
	<script type="text/javascript" src="<?= base_url('/public/assets/js/senate.js') ?>"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Cambria:wght@300;400;500&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<title>Blog</title>
</head>

<body>

	<body>
		<nav class="navigation-menu">
			<div class="navigation-menu__overlay" onclick="toggleMenuClicked()"></div>
			<button type="button" class="hamburger-menu" onclick="toggleMenuClicked()">
				<span class="material-icons" id="open-icon">menu</span>
				<span class="material-icons" id="close-icon">close</span>
			</button>
			<img class="site-identity-logo"
				src="https://upload.wikimedia.org/wikipedia/commons/7/75/Seal_of_the_Senate_of_Nigeria.svg"
				alt="senatelogo" width="110px" height="50px">
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
	</body>

	<div class="container">
		<div class="header">
			<h1>The Africa Times</h1>
			<p id="p1"></p>
		</div>
		<script>
			var date = new Date();
			document.getElementById("p1").innerHTML = date;
		</script>
		<div class="news">
					
		<?php if (!empty($posts) && is_array($posts)): ?>
    <?php
    $totalPosts = count($posts);
    $bigCount = max(1, intdiv($totalPosts, 6)); // At least one 'big'
    $mediumCount = min(max(2, intdiv($totalPosts - $bigCount, 3)), 4); // At least two 'medium', no more than four
    $smallCount = $totalPosts - ($bigCount + $mediumCount); // Remaining posts will be 'small'

    $bigPosts = [];
    $mediumPosts = [];
    $smallPosts = [];

    // Distribute posts into big, medium, and small arrays
    foreach ($posts as $index => $post) {
        if (count($bigPosts) < $bigCount) {
            $bigPosts[] = $post;
        } elseif (count($mediumPosts) < $mediumCount) {
            $mediumPosts[] = $post;
        } else {
            $smallPosts[] = $post;
        }
    }

    // Interleave posts ensuring that 'big' is always between 'small' and 'medium'
    $interleavedPosts = [];
    $maxBig = count($bigPosts);
    $maxMedium = count($mediumPosts);
    $maxSmall = count($smallPosts);

    for ($i = 0; $i < max($maxBig, $maxMedium, $maxSmall); $i++) {
        if ($i < $maxMedium) {
            $interleavedPosts[] = ['type' => 'medium', 'post' => $mediumPosts[$i]];
        }
        if ($i < $maxBig) {
            $interleavedPosts[] = ['type' => 'big', 'post' => $bigPosts[$i]];
        }
        if ($i < $maxSmall) {
            $interleavedPosts[] = ['type' => 'small', 'post' => $smallPosts[$i]];
        }
    }
    ?>

    <?php foreach ($interleavedPosts as $entry): ?>
        <?php
        $class = $entry['type'];
        $post = $entry['post'];
        ?>

        <div class="article <?= $class ?>">
            <img src="<?= esc(base_url('public/uploads/') . $post['image']) ?>">
            <div class="articlecontent">
                <small><?= esc(date('F j, Y', strtotime($post['created_at']))) ?></small>
                <h2><?= esc($post['title']) ?></h2>
                <p><?= esc($post['content']) ?></p>
            </div>
        </div>

    <?php endforeach; ?>

<?php else: ?>
    <div class="col-lg-12">
        <p>No posts found.</p>
    </div>
<?php endif; ?>


		</div>
		<div class="sidebar">

			<div class="pins">
				<h2>India</h2>
				<img
					src="https://lh3.googleusercontent.com/KTcDT5xHWhaUA2FIrTS2TkaLUaC-0OQcd13lSXFwl653FFKvxHipDs4AA3I5Rx-jr92buWD9pGRoo-tf1FcFVIKvjLZ97cKbdZykKKPdWTmkMLObz7yU_G2clKk9bvfBiy4VJVrDNemdLECTEkqwCwnYP7qqQxrFXWxOJH3qLl0kNxYUAcVoVOjEPYd6XmYOE5OZ8cIRg5h7NgZcjJS0_ZLSRAy0dhVrSd3DXxL84sMZyF7cwrDUH4VN6oWbeYe68harYMaD2Gl_G623G65wKlFTMqJCn7ddmzCrL644cXLFEeWY8DOFpr5xdvOIUF68ZyCP6p7DQMg3J_zagTXvjVES6WcQS-tLVhvVsS879B2t3i8DSuojD-GJuF4qtPSmX2SGQMbIJlIXJlz6Z6o_gHHNjscqAc5ipGkDcP3cYiiN6Zij0PjL7Jec0uCZCMvzpaUWwT1UwRJXWkHjah_LJ_UNS0UKJwD7S6cCdGUCgitGPOc9gRUtkPj_ixMWehJVmtzqOAv8jRW6EWkkObNM7s2SD4ckbKn8LcpZCxT00l4j4QRUvfYrChnvZDgIoF02afza_7a5E8muajl1HKhYM7w-o-ulVXuwaYE1VEulj7Fb9bHOnbTLz3vNTR-c93H7CNLdokn8oeTHMdQXIFivDD7vTwKU4qZt4KXr9ijU=w300-h200-no">
				<p>India successfully launches PSLV-C38 from Sriharikota</p>
			</div>
			<div class="pins">
				<h2>Cricket</h2>
				<img
					src="https://lh3.googleusercontent.com/cTkjpO2E82PyC9p0ZFbSFQc9-9D4tu43igodpT9pOZBrlmfjgHOTs-I9RLcSgGs4yisEfuoKGjkjfEG5QS582wmnVzmXd1ppzkwMciriQcHiZ-HkYsRQqx1FSfMCINp1z1LyiLKpzO0iMNYqJ_ZPJ0ysfJuYYT4rJmqKHyq4hVzdw7AaJ8Kgi_h1et7wXMOQ4nKPy6-7h0z6Mhu_Qf9Y0z0YUNYyX62gB-bMFtAkTuEbthEwDsgJJN4pLClqECj_yrpX-pB7ScCfI8Efr-SgCLb-syDk0BV2l9VG6d5Gvcl4zEKnn0BGkXFDQSyJeKvy6F8ugGY2O9HlGFgIXUBBPEf6sfjGzKg-dooJrMjwRNgiTpPRN2ZiAsdEtLGoHrukQcqjQ9Mx-po-BHgJUxr0iCHeT-T1LHSCBhSfpyfZa5SfHd8kwnHqlXcy9fA24AMcBIpW2LMFDfuU8_yYeB9sfd2un7f9tur1NCjTZSr4M25PUja3UVmpIE6JfvzGaH4xVL2F5O1L7vvpU1Ih8Y8pPTJE6txLyv6a_MxfXGUTFgbCcmw5JV5a_AZhfeQ5XBIT52r-RTjddTmgpz99xfIc-uxeDUgFLmlp8IsbU_W2WnPpKbReQO6xRsdQBrawxDC2q4uBBaRo3wTwMhH8xWsbappVUcEiow=w214-h120-no">
				<p>WIvIND:Rain plays spoilsport after Shikhar Dhawan's 87, India placed comfortably</p>
			</div>
			<div class="pins">
				<h2>Education</h2>
				<img
					src="https://lh3.googleusercontent.com/ZTiWbnDkwZow7WJ5fLMJNqFF6RCNh-3mtM_xusD4LbmlvfD7fxr1iG29DCYkgXTDeHf-ztekkuvXCPUKFzuLq5QL8NE4hUDOBE5ZMbh2YzhTBhbljXkaT1EEAbYgmoNRXZh0mSgOMLoL7iiJuCr41l-S7KYZ5or2WvIWTPL2QvRwHzFkvXDOclY1BPm-3GdOR4CNavASA4EUSuQcSn1IhA-SMPWwd1T51yOntWSGUM7fNsYuIaGsc1qhr-CrD2sKWZcsv7V5XYxBZMHrzUDvaG86Teh88pAem-aTsh6olHgGGmh2XE-jB9rrTSxbm6Ny2Lw4YITxBLsxnUUg0uyijzHoVihbEuTRXJ1oZzi3EpryGnHXkQ0k7V1b-VNiHmh7JSoCWf1DLdgrbHgc8DYaqAqylF6iQsFVRJ6Ch167MoBecELbUy36Te9bVLvL_EivYe9uR5SALixWLXN6jmbrZ5FjKb_na5hRlVjqB-FBYx2GbVf5X67Inc-trdh2EgRWU_27uX4Xb7ixAYns7txCjQWEg0rzhwG5iDHGAwk-Jrm3Et4XS0mlsrYA6uQMCfPnZ5671RKi1mDBkVH6V5jPAnVp41gNpjogRpRKyD3r14a9XC8vjh4dC9AWzzBibMj3Z7snoA1WLF01wxe7cf1ELe2z9Ba698vqxEhDTUM4=w640-h360-no">
				<p>NEET results declared, five transgenders qualify</p>
			</div>
			<div class="pins">
				<h2>Science & Tech</h2>
				<img
					src="https://lh3.googleusercontent.com/3uMfZs43NrKsN2Mb3ZWAYEkuPNgdvM21ADM673Cwkovbi1b57MyTxVFB_Px7I6mX9u3OhDWdFC3EihI9yvxsRLwiGndLbubfGCLlWd__7adfliYM7oefsoZK2CQpMF9ZQUZWcDN8aD7imitrg38D17snHKbPDylhsX6OXodw8jQ8DHApbgHCq72JZavnZiB3JVssGkaLjpOQnS2RvKwJInRmy_3Rkk-o9uGtHX7SV6rJETTCPqiq0YMSohN0qSv_hAo_h2Afyd8IBK8U1an8Rl7WAyK3X4fSPXDgXBYzf2uZAmQPm1aSvzAK-2Vi9WVdqN2Yr3u6PaWCkYJ-k6xNwCqQaF4tynAhK6VS3jI_MvMyx9pFp7d4FfA05xUDLXGGymyJTLex8-ZSpIZxSfSplC5CU7nmE8kOSF-Rf3-nOAcr-qPE2ONdiOJBH0eKZBihwhtlcfgX58_1w0qKG71V_3aeB_ivnHZiKtGI4Be-XWZ7mWXCo_ycPbxrG-W6dkNdllYBfzjPlUMJ9cDZPw-4TUFIo_DanvxqJFM9EkLwx9sY6SQH6KnfllsWWyVVY_UPyUEilh8Pha7l8QN2njQ_Zyzjlxg3AOrYRuLXKwrMSm_wJIfTZWRR7MaZY4Mkg_Eek2OtPkguPura8oYW6uilGX-5sAlqq1hWMTXRO0kS=w640-h360-no">
				<p>Smart eye in the sky': How ISRO's Cartosat-2 will boost India's military surveillance capabilities
				</p>
			</div>
			<div class="pins">
				<h2>Bollywood</h2>
				<img
					src="https://lh3.googleusercontent.com/kQKDxFzUjWA_pxUYIBepqD_fTnFgD8HAHVIcN5RZpdg3gE8rXFRqoHQNm5KBdc1HqNpU-nW5AnngrkXzbIS_mUMcx7Gr70f7V5xqxBJeLWbDnsoiQX6d-1wiXHaWLrGSfSLxWjCbVoZNvSRuhqwfNUvuXeaTjBbgmIMQxiKDlD8FSMBkhLh0-7L54fM6yUOf9VHVt3lG76l_4jRpPreT4YYMKkzZXgpvuiyyOq4NC4KhBY-8AI8oaUC2a808uOO5p3LnqYu4awf0002mAiT0IGmUwLETyCNBHQ8-Z5-q3lwjar1SiXd6Wb0bV-S_IHSD_XXBdkr8kqParBjTo5vjztwb589v05PVQ1tFk18JX5ShJLpYT1PIk1xXOZHdhAnU6quJdiDQ23FfSQn__RKsnxBLlqlwOzA1sszRgq4kr7XsaMPAXJkIdxZHSZ0NXzFoyhInjowQ0NfEkMDH1uWFG8UooDJJxfs-K79qn3g-neDWvNR_hoWWYMXB6Po6Ohu4AsyjGhjPvhBOaJHmA_qfsdyK7lhoKi2WqQAuI4vmsD74OI1KN8NxL8umlQoMnsEhhFPWwyZtKi-wsQ5RwRGoyAA2GWVxvWhyUgfq1SY1W32L9djDW0Pe99eBayNKzQBkvpg_V176PUk60qp_dB_ijhdbT7-0q2FJ56ID2xXV=w640-h360-no">
				<p>Box Offcie: Salman Khan's 'Tubelight' opens lower than expectations on Day 1!</p>
			</div>
		</div>


		<footer class="footer">
			<p>Website copyright &#169; 2024</p>
		</footer>


</body>

</html>