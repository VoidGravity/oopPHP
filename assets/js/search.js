var searchForm = document.getElementById("search-form");
var keywordsInput = document.getElementById("keywords");
var locationsInput = document.getElementById("locations");
var companyInput = document.getElementById("company");
var submitS = document.getElementById("submit");
var searchResult = document.getElementById("search-result");


searchForm.addEventListener('submit', function (event) {
    event.preventDefault();
    var kayword = keywordsInput.value;
    var locations = locationsInput.value;
    var company = companyInput.value;
    var formData = new FormData();
    formData.append('kayword',kayword);
    formData.append('location',locations);
    formData.append('company',company);
    formData.append('search',true)

    fetch('./offers',
        {
            method: "POST",
            body: formData
        }
    ).then(function (response) {
        response.json().then(function (data) {
            var htmlContent = '';
            data.forEach((job, index) => {
                console.log('job',job)
                if (index % 2 === 0) {
                    htmlContent += `<article class="postcard light yellow">
				<a class="postcard__img_link" href="#">
					<img class="postcard__img" src="${job.image_path}" alt="Image Title" />
				</a>
				<div class="postcard__text t-dark">
					<h3 class="postcard__title yellow"><a href="#">${job.title}</a></h3>
					<div class="postcard__subtitle small">
						<time datetime="${job.date_created}">
							<i class="fas fa-calendar-alt mr-2"></i>${job.date_created}
						</time>
					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">${job.description}</div>
					<ul class="postcard__tagbox">
						<li class="tag__item"><i class="fas fa-tag mr-2"></i>${job.location}</li>
						<li class="tag__item"><i class="fas fa-clock mr-2"></i> 3 mins.</li>
						<li class="tag__item play yellow">
							<a href="userApply.php?id=${job.id}"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
						</li>
					</ul>
				</div>
			</article>`;
                } else {
                    htmlContent += `<article class="postcard light green">
				<a class="postcard__img_link" href="#">
					<img class="postcard__img" src="${job.image_path}" alt="Image Title" />
				</a>
				<div class="postcard__text t-dark">
					<h3 class="postcard__title green"><a href="#">${job.title}</a></h3>
					<div class="postcard__subtitle small">
						<time datetime="${job.date_created}">
							<i class="fas fa-calendar-alt mr-2"></i>${job.date_created}
						</time>
					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">${job.description}</div>
					<ul class="postcard__tagbox">
						<li class="tag__item"><i class="fas fa-tag mr-2"></i>${job.location}</li>
						<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
						<li class="tag__item play green">
							<a href="userApply.php?id=${job.id}"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
						</li>
					</ul>
				</div>
			</article>`;
                }
            });
            searchResult.innerHTML = htmlContent;
        });
    })
});

submitS.click();