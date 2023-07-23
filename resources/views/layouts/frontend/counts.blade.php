<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

        <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-people" style="color: #bb0852;"></i>
                    <div>
                        <span data-purecounter-start="0"
                            data-purecounter-end="{{ isset($totalMembers) ? $totalMembers : 0 }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Total Register Members</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ isset($donars) ? $donars : 0 }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Blood Donars</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Services</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-headset" style="color: #15be56;"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ isset($contacts) ? $contacts : 0 }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Users Support</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
