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
			<div class="article big">
				<img
					src="https://lh3.googleusercontent.com/M8JvfafrfqoRnprRGxJHbkWG16OG8JoeNtCrcYwBiVYw-cWxN5GgrReRVlzXja3FJqQUJMr0XWbhYuOMiJDKaPJNfr550S2QHAdCJ0Y8IrDI0kHLuYX7VDY-5EtkPu_q9EC1-Ls-tflFgQ3wzRjowPhtfF-VBgzzUup6cqxPtpUSxGHSkn25keHSPCO4QDmwkyGQ5anJu5fPJ7ANTD3sEaYB7kUxduap7qL5rcia67dJpSbsiF_UA1WuPNNnTc_Ab6zw_jDabrsPMF0ZHTse80freR2fatmKEZVs2lnbiDoBaHbzPbfH8kbDwUOx4ytFwJyIk7ktBqItI_SRc3eUqQX1b96E0N4n15C5rS1lXBBGBTYqoZ98cqGRJR8PFsY1G5q7ldM0nZ0Ymb8bf4AcVdK6gCJz4PfKM4wbv0QVEUDO9xkeqkZagTl9x2T-L2YKkQS8uujlTwiGUQSrhBYcy3k4GZm8-9nCGM2JtttAcHGC9AioBayz4dTYwDYgKJVS4TPScrrS9TjpbeMZGew-Jy_MoY1fxYkZTn_5zkf_KvqOpVevM6UO9w50kfmTwaMHgXJxsaxolemhKJQEUApn2CusIOnVyOyaC7f2AiLsMwbh_0DUx1jZZDnGc_fYAudR__2KjjmRtqkCJE0NtvFedsc3ubc1mvlUCHAf1HY7=w883-h662-no">
				<div class="articlecontent">
					<h2>Today Is “National Take Your Dog to Work Day”</h2>
					<p>If you’re lucky enough to work from home, every day is “Take Your Dog to Work Day.” But most
						people aren’t, so today is the one day a year that many companies allow their employees to bring
						their pups with them. Some workplaces are so fantastic that dogs are welcome all year
						round!While it’s obviously not recommended for dogs to be brought to work sites that are
						dangerous for them or where they’ll get in the way, such as an operating room or a factory
						floor, offices can be the perfect environment for pets.</p>
				</div>
			</div>
			<div class="article medium">
				<img
					src="https://lh3.googleusercontent.com/O-GwgRucU9UajDdrLy0WwaPJESwd6R0GstCU87GA3buQITe3ul6zugKTgk5yTE0m3taTPzzFCd59mdK4MfmCGJKT1APGOUaItRwLzfrz8oNillKB_lOt7N1UXPti2Z9iAV9Hz5G-PLE_JuOhQptTM_6RezVpmJ3A0PTkirKFFqH1BF4deDyWETv313LybeqpO3GSpg0TfNxaoPgOUuKsxuJpTVkjJ3Z0KMp8btQZJ_R-oNA04ey-UFqBc7BK7aJTU9cit96X4QvYmfrZ_1fXd0XXYXwSHcxMc3QQiTCUkMdSrtq9l89lY3v1yyl133-yw6F0cq8kk_c5w8TssjHnlH21LWynWK_ZOs8Vtu7gmteLffINKJh7gnHDZosbepzKB1-4axmkBtpfRPGVzbntWjF0kkycRmmGA8Xf8r-sftHmwuBFqHEGTF_ao45QlTxl2iVSjA44ETB7ErD9GmZBdxawc-NoZyXoEY3XcF5cpEEiaqHeROe5ZgNLqJWeCkhZVCCLfbKIb7iZ8Gvcge-BYwNUIb17_7KxO94LD99pieI4vTaFDJAZfiklrELeUjEyGd6yUOimIpyLrye42pQZ4k9YXFXxA6mqbpINUF5JxjGb4QvwS73o4LlcfocTmQ5R863l9oaV70hGER1Q0dgFK0IOl9sINBHOWwNi7K5S=w300-h168-no">
				<div class="articlecontent">
					<h2>The future of Amazon drone deliveries</h2>
					<p>Amazon (AMZN, Tech30) has filed for a patent for beehive-like towers that would serve as
						multi-level fulfillment centers for its delivery drones to take off and land. The facilities
						would be built vertically to blend in with high rises in urban areas. Amazon envisions each city
						would have one.
						The patent application, filed in December 2015 and published on Thursday by the U.S. Patent and
						Trademark Office, features several drawings of these buildings, such as the beehive, a
						cylinder-shaped center and one that looks like a UFO</p>
				</div>
			</div>
			<div class="article medium">
				<img
					src="https://lh3.googleusercontent.com/R8GDExAIdicN6wGMEOxd7Js1DbtoDp29s3RE8X0bK6cBcrxO9T0XO3qvyTgpOzMlx7pmGLlDC9mTIzPE4Bs7zeI7C9_zpPFFUwavC42E2-F5rVMZuKUmwgc8affSvesyfFvQFniHqrzGPfjUqsOyczHvcSv041HYJExVNjVL0KaZkWmPnoDc3hUFRbkRZOyHjz_EmAjXP6QhBgXi-KavBj4N7DNISU_Ew44Uare7RClRR2IjNV0e535zEjgfrA9FJZyH3FSFUKX9n6-WGC2OrDMsnr2SY8YQHqCxuzwztxCc1j5JgwGb3xE43k59Rlnf4K8dLhAxa6KHny69d8FllCXinwC3tFiC0CaPO5J9P_mOf6WFEb6UqvYCyKiVIDw4OjHW16lEKOs1kycJOq0wIVVA_ZjWhHE-ZrFxOuSUdYJDBoUZVf3kNc_gDJBUwwcHyWVUkTLMFqvAc0G4RbTUnMAmf4eGYSjNAP-yVOBEDPrwX_qlQ8sAbCaNvjismOZW6FjQ77Qk7MuJgsE6buXjGOkiOZIYg5aOO2a8tKM0PeyMPqIz5otDUCcH0TAqPp-elHq7Bdi2QQSyQZx_eysvO4auwmty_T1cQxNqQkhiXN4xiO-q9LKKWPxV_UHKxU4Mcung4RHA_us1wtwEsJw-gxq6EDm8LD_XPm7oUwLD=w1100-h619-no">
				<div class="articlecontent">
					<h2>Japanese foods we love-Sushi</h2>
					<p>Without a doubt, sushi is one of Japan's greatest gastronomical gifts to the world. Almost poetic
						in its simplicity, good sushi relies on two things: the freshness of the ingredients and the
						knife skills of the chef.
						Whether you like your raw fish draped over bite-sized balls of vinegared rice, rolled up in
						toasted nori seaweed or pressed into fat rectangular logs, delicious sushi can be found in every
						price range.The sushi at Sushisho Masa in Roppongi is nothing short of perfection. At around
						¥20,000 ($200) per person, it's a splurge, but perfection doesn't come cheap.</p>
				</div>
			</div>
			<div class="article big">
				<img
					src="https://lh3.googleusercontent.com/iwHpvSYQLXj93o40Y4awbxxpv5kumD4gWHQ0Xx5G4K-j8MpLKwDIuRuSSLbimXKjWrT3DPpTvqrrJfzJ3XBj1GVhpk7L6zXfobyr_VdJTw9I2Olth_6CikTjwvff6TckBZbH855mxOIvH7cHwgExEYq975pmF9NReIawb7v351EO-b7YE6K4lBmPoaJpvltbvAQv7QRpnz2BY4g67X1iAfv0Z-kjpwae0nYbOYWq5HIx293AFzaUGVKRA4EgkaZVlfDHxg6vd1SDVhH_MqlU405PFQ9OBLcNr6kds-AZDMWeHdXRZ_7a2zo3BKgMN1Oj26F0V4RFKwYuZmK4iZ034Q6otoqY0OgRsaYddc_wCfXU4rQ3nYOcJDdTHspxBmI8y_WsTSBrj1Po4VkMo7RBHlLOx5T-_tcbu95PNCkaB4kF5MUAud14TZurJtZmkmXEV5eOBRo4hcCb5WXxsEXZ5QCWx2q2ZTLWyyuEPBQAOEpw9vpwrc7CsXFugp8J4jkhzb21zN4jmB0egccuFGShxDY-gMoxd1mHd5wACdWYWsFI8v3aFLuK0n4RaEfdzULpS2VgyAeMl9FptWPA5LtvZ6pdD_vjD52Zp4pT6Ze798rWqoCp8GBPetP3knAJEZ1LNsm4wmXYfvT-tdTedRCh7WW8HQXhkWM6Pr1_EGHt=w1100-h619-no">
				<div class="articlecontent">
					<h2>New York City's best rooftop bars</h2>
					<p>There's something about being far above the hubbub of the Big Apple's streets, especially in the
						summertime, when humidity levels soar and the concrete feels like it's emanating heat waves.
						"Being on a New York City rooftop gives you this special pleasure of feeling part of the city,
						inside it, but at a distance," says Ray Chung, director of design at The Johnson Studio, the
						firm behind the rooftop lounge at The Wit Hotel in Chicago, among other projects."Walking down
						the streets is one thing, but being able to let your guard down and see the city reduced in size
						-- all the while still breathing the same air and still hearing the buzz of the city -- it can
						be intoxicating," says Chung.</p>
				</div>
			</div>
			<div class="article small">
				<img
					src="https://lh3.googleusercontent.com/FvRl5ZzboJ4Cid-hYc0hj9uFmfQgSV85Ka9JCbh6hW8fnCqkYedJ65kL2VPXdSAT7gX2Zoa4zad-VaSjJr2louMK2X1PHGpVmU5qRqbkfEHFn8xczjWQqHZ_sJMbbXisAQBhh1sAVp3KuD-pRbwpNMJ1Ck2BsQK4fayGUU0BcqihB6GJF04rf_kDUs-2Gk7G4-MCfw4GUvlCHtDdBkfR99NY6D6oGwQxlNggqY5ksTX4Nh_wHLjwhaufIMp6XlPFO847w9M_VQV4pVYFf4nZ8YWGTHEiVRFgh3-WwTZNzoyv2btOjySyUC6lsArD-1q6H0m2lgG-qZ5HJBfIG3XtTQs5VK9bKSDwQR1aaieaiqHDFrvYPXdGjLAdz_X3jKH9-hHXnNlN-kDomloOGX6q6RpPgPZxa_eWHEBCiA89u6VSU2HzAvfAq20Gkx3DV_opG2ym3j-Wtf1aCfiFE2wCXVKw3JmQZ0NP04Q2CFRH6Zc8-pu2owkzs0TSvjSnhGivXwhLVpMEszt3-I5qmA7xxKmSvpv_84Y_ZaThmZOgbM2mvegm_B1ows0uKwSoXBh8fkqPMZm6t17rbdvtFXAJyhk95KAd4d2MGmoU-WaAkKWwJwmJO3lT1I_aFcGRSXiQzXZdJU97pS8-B4Myo3VVPBVru-cNShvLcN1FJeZm=w307-h173-no">
				<div class="articlecontent">
					<h2>Meet Gaggan Anand, the 'world's best' Indian chef</h2>
					<p>Gaggan was sitting in a Singapore ballroom attending the Asia's 50 Best Restaurant Awards,
						waiting in agony to find out whether his eponymous Bangkok-based restaurant could hold onto the
						number three spot it grabbed last year "As they got to five, then four, and my name hadn't been
						called, I thought 'that means I'm three again ... at least we matched our success, at least
						we're on the right track," he says."When they were about to call number two and I still hadn't
						been called up, I thought 'If I'm number one, I'll try not to cry.'</p>
				</div>
			</div>
			<div class="article small">
				<img
					src="https://lh3.googleusercontent.com/ixrNTtsZ_M-3Q038yOT8Q0HKagba6dkZPzgirdN9mX8WZ8BoJSjjrxtd6XYlLVyOh8wVFUN3kW7WjN327zfjghhp-XvTO_5H5zmDQ70ZEp2hlQF_rQrIJqviVOJsxVeXi52pHH2Shp4HKO25e9xtnutE_bYju675bmS3HO9UVOAGYGxqScqt-_HCOGmZkDUvpNdFAI40C9f-FJkhinmMparsOojkZVA5otPzhCd4L8OqGTgtkFC0uO1ISJKbleSzimuLT4Cqlpa4SXTWlC2zKxOplR2Ukp9CZOcc7Vig6KsJ0mxn37BJpHV4e7KqyZpTdOqeTyNHJpo8sr-EB1MMRVlPNudxSfIX-yaDTMGyjPBCiEW44KrCpCj32NRi3z04CzWdtkOduMz1Ia5m3r1uR3C_DtfPz75Jplzz7o42FATU8mjlpIolw9FVkbPVP_2RHu1q3rsU5TGkdNWR7IGmq24vAbWbo2puqQCH2adpX7LbBpLcnSyrzYSMz0zXGHyo3olxnUr4yTaX3g5rd4Me8Fgdr4Z9f3z3sA10vQPPSwjaI_ekZ-JwRskkz6vzVYf0WLW5kUPmjgtS-eNZGWN2VZ6Z4TpEuEiOVuHMh5zUoLYYxAQKUNdGXoH0_nWIZUngfJ2EKOuYi8k38cHpr3XhF3XjYbmMW6m9bAJDcK47=w1100-h619-no">
				<div class="articlecontent">
					<h2>The best things to do and see in Newport</h2>
					<p> Many of those cliches about postcard-pretty coastal New England towns got their start in the
						same place: Newport, Rhode Island.The town is best known for being a summer getaway for
						America's aristocracy during the Gilded Age, with wealthy families like the Vanderbilts, the
						Dukes and Astors all owning summer homes there (they say "cottage," we say "ginormous mansion")
						and throwing glamorous parties.Although more of the luxurious estates are museums than homes
						these days, Newport hasn't lost its seaside charm -- especially in the summer. Here's our guide
						to the best things to do, eat and explore both indoors and out.</p>
				</div>
			</div>
			<div class="article small">
				<img
					src="https://lh3.googleusercontent.com/RB7kM8phJgRqrrmT9gxyKiqMJ1zrmq4wxeTUfectRaBfT497cMwncRpxWYzVHWrMgP6m3disLn_ICDLoxL1Y3O0yOrczyu26eLtZhCU9fOh_LFV-QqOLFDth3yL0VfNKi_APMEJqBZxk9q2ud9VE-vrgHs0bTv1UNAlw_aJo7TCHr6dOT7toE02L1V_pXzSTobTwuXD5Lrzc55wamCw1L76lZXqZmltoh6319WIZPf4OMfxVJ5xU55PuCWgBNzs_gcIdnsmziOjFLQ2K7dYFSct74LkR4rpTINX1wM31GEW8FDc6JZiTxs92KTWFd5aXpKgbrR0PLmvpc6UzMtOtTZ6ilAG_9OmDpE3c9TV6Jn0PKW_4JLcauuhz0brh8QeqTstdUTsrBRvkZaI5NknzfdxaSaKpKjkregB9e0b99RJUvpfqFAvELW92XE3TQFBkqdOQkMkQFhhz5wWqhm3ZCh62fdmy60ZHiDFW9A8FK3LGu-s2YirbL4PIMq9K-KX2XKA6D8QK6X4oCQHhpBNI2B44pYFLtY44qr_iJAF-5KWp_znkeb_BwSPb-xDpDs6j8liNId_6DDBy02g0WenGzCC51lZ9LJVw8LOyMtU6Ja3LV1oHQgZFVyaLCXD1Zd80kQ05L9qOmX8s3A0fGdk1vALhEnhDuS9WbxDn-eHh=w273-h184-no">
				<div class="articlecontent">
					<h2>Sixteen Dogs Find Forever Homes After Being Rescued</h2>
					<p>Just minutes before the Humane Society Shelter in Bangor, Maine closed for the day on Tuesday,
						they only had one lone puppy left who had yet to be adopted. Not to worry however, that puppy
						too found a great forever home, marking the end of an amazing campaign to save some dogs on
						death row from a high-kill shelter in the southern United States.Ada Webb was the lucky person
						to adopt that final dog. Webb had been in line there for quite some time waiting to adopt,
						hoping to be able to surprise her nine-year-old son with a new, four-legged furry family member.
					</p>
				</div>
			</div>
			<div class="article big">
				<img
					src="https://lh3.googleusercontent.com/s4drGMtU6AaHz43tf95K1bni6Qs8THokpd-6ddI1r_xzVHbo9OGnAsvAitgewnT2hbVp22-TNP7cvqgGbaPbnRdGeXmTs8A_Fknt1aHtZzQr0xlSw_X74l02bwuiHQF2g_WFMGdjQkQVs1nWi-oZkbsGLtqNNv10WNgYE1ND5cLrxOtA0liuLEi2q1HUJ0Yesl3YMwlL1-WdUOxI9GepODLOqbBPMoeltg05G1_x0OQauGjMVl2K4WTs5n3SJmqv2FI3Itnt_55J3m6Wz3sL0EtszXAhE55o7wwaP1cUiyYf9UTpb3JHcHZmIw7Nvcxn31vBbu7oxN872xZWBT4brXfHuR5yaUM7T3GwciSqdEAddGgGk1aIRBtUxZJtRLBETW4wOathkCpkteaezohUDdYoVISJb1JechGv_P6GSLhSAGPxLa3rWVAqbM3lfq_CUQgWq3PwyTu3s0C3fzbv3E6B83AtjKvUrAcFgnfO0wq7Otu2TvsfA6CxVlWFcXyWIgHlu9qRDGDZ9_65Px5mlGohG62cDz0Gdxuxt-Sv6BRPK-o1IS3trmoKpqZm0Zxpco8Lz20HfqBi4Pz3O3GM8JQD82C1IodAnVIx2eTfpLtnAD7nMchey0EYgr2H1F1sKAFGzlK_DcOLp-IUB3Uz7lf2Xzf5I2PFJTY8QjXk=w299-h168-no">
				<div class="articlecontent">
					<h2>What Facebook's new mission can and can't fix</h2>
					<p>With nearly 2 billion people around the world checking in monthly, it makes sense that Facebook
						is dealing with some very sticky issues. The social network is facing increasing pressure to
						address them head on.
						He's shifting its focus from connecting individuals to building communities, namely by getting
						people to join more Facebook groups.The change is summed up in the company's new mission
						statement: "Give people the power to build community and bring the world closer together."But
						how much of the company's problems can really be fixed by the new direction?</p>
				</div>
			</div>

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