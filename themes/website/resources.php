<?php $v->layout("_theme"); ?>
<div class="container-fluid hero-img">
    <img src="<?= theme('/assets/img/hero-banner1.jpg') ?>" width="100%" />
</div>
<div class="container-fluid">
    <div class="container">
        <div class="page1-content">
            <h1 class="text-center pt-4">Caring for a transplant is a lifelong commitment - <br />
            how can GPs help these patients? 
            </h1>

            <p class="text-center limited-block">
            The following conversation is intended for educational, non-promotional use to optimise long-term care of transplant recipients in primary practice.
            The speakers received honoraria from Astellas Pharma Australia. 
            The opinions expressed represent the speakers’ experience and personal views and do not necessarily reflect those of Astellas.
            </p>
            <!-- <div class="text-center w-100 pt-4 pb-3">
                <button class="btn btn-large brn-outline circle">Delete Button</button>
            </div> -->
        </div> <!-- page-1-content -->
    </div> <!-- containert -->
</div> <!-- container-fluid -->

<div class="container-fluid brand-bg">
    <div class="container">
        <h1 class="text-center upercase pt-3">Optimal Management of Solid Organ Transplant Recipients (SOTR) in Primary Care</h1>
        <h5 class="text-center py-3">Professor Gregory Snell and Associate Professor Bronwyn Levvey 
Lung Transplant service, Alfred Hospital, VIC
</h5>
        <div class="row mb-3 h-line">
            <div class="col-lg-4 themed-grid-col">
                <div class="row video">
                    <div class="col-lg-12">
                        <h4>Episode <span>01</span></h4>
                        <video id="my-video-one" class="video-js vjs-default-skin vjs-16-9" controls preload="auto"
                            data-setup='{ "aspectRatio":"16:9", "playbackRates": [1, 1.25, 1.5, 1.75, 2],"fluid": true  }'
                            poster="<?= theme('/assets/img/newcover-video-1.png') ?>">
                            <source
                                src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/Placeholder-video.mp4"
                                type="video/mp4" />
                            <source
                                src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/Placeholder-video.mp4"
                                type="video/webm" />
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                    video</a>
                            </p>
                        </video>
                    </div>
                </div>
                <p class="text-left pt-3">
                Our experts discuss the challenge of achieving optimal immunosuppression - providing graft protection without adverse events.
                </p>
                <!-- Audio PLayer -->
                <div class="audio-player-block">
                    <figure>
                        <!-- <figcaption>Listen to the audio file</figcaption> -->
                        <audio class="custom-player" controls style="min-width: 100%" width="100%"
                            src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/placeholder-audio.mp3">
                            Your browser does not support the
                            <code>audio</code> element.
                        </audio>
                    </figure>
                </div>
                <!-- Audio PLayer -->

                <div class="d-flex justify-content-between bd-highlight py-3">
                    <a class="img-link" href="<?= url('storage/audio/') ?>file.mp3.pdf" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-download.png') ?>" /></div>
                            <div class="action-label">Podcast</div>
                        </div>
                    </a>
                    <div class="v-line"></div>
                    <a class="img-link" href="<?= url('storage/video/') ?>file.mp4" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-download.png') ?>" /></div>
                            <div class="action-label">Vodcast</div>
                        </div>
                    </a>
                    <div class="v-line"></div>
                    <a class="img-link" href="mailto:info@arterial-test.com" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-share.png') ?>" /></div>
                            <div class="action-label">Share</div>
                        </div>
                    </a>
                </div>
            </div><!-- .col-lg-4 -->
            <div class="col-lg-4 themed-grid-col">
                <div class="row video">
                    <div class="col-lg-12">
                        <h4>Episode <span>02</span></h4>
                        <video id="my-video-one" class="video-js vjs-default-skin vjs-16-9" controls preload="auto"
                            data-setup='{ "aspectRatio":"16:9", "playbackRates": [1, 1.25, 1.5, 1.75, 2],"fluid": true  }'
                            poster="<?= theme('/assets/img/newcover-video-2.png') ?>">
                            <source
                                src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/Placeholder-video.mp4"
                                type="video/mp4" />
                            <source
                                src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/Placeholder-video.mp4"
                                type="video/webm" />
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                    video</a>
                            </p>
                        </video>
                    </div>
                </div>
                <p class="text-left pt-3">
                What are risks of long-term cardiovascular complications post-transplant and how GPs can help?
                </p>
                <br>
                <!-- Audio PLayer -->
                <div class="audio-player-block">
                    <figure>
                        <!-- <figcaption>Listen to the audio file</figcaption> -->
                        <audio class="custom-player" controls style="min-width: 100%" width="100%"
                            src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/placeholder-audio.mp3">
                            Your browser does not support the
                            <code>audio</code> element.
                        </audio>
                    </figure>
                </div>
                <!-- Audio PLayer -->

                <div class="d-flex justify-content-between bd-highlight py-3">
                    <a class="img-link" href="<?= url('storage/audio/') ?>file.mp3.pdf" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-download.png') ?>" /></div>
                            <div class="action-label">Podcast</div>
                        </div>
                    </a>
                    <div class="v-line"></div>
                    <a class="img-link" href="<?= url('storage/video/') ?>file.mp4" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-download.png') ?>" /></div>
                            <div class="action-label">Vodcast</div>
                        </div>
                    </a>
                    <div class="v-line"></div>
                    <a class="img-link" href="mailto:info@arterial-test.com" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-share.png') ?>" /></div>
                            <div class="action-label">Share</div>
                        </div>
                    </a>
                </div>
            </div><!-- .col-lg-4 -->
            <div class="col-lg-4 themed-grid-col">
                <div class="row video">
                    <div class="col-lg-12">
                        <h4>Episode <span>03</span></h4>
                        <video id="my-video-one" class="video-js vjs-default-skin vjs-16-9" controls preload="auto"
                            data-setup='{ "aspectRatio":"16:9", "playbackRates": [1, 1.25, 1.5, 1.75, 2],"fluid": true  }'
                            poster="<?= theme('/assets/img/newcover-video-3.png') ?>">
                            <source
                                src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/Placeholder-video.mp4"
                                type="video/mp4" />
                            <source
                                src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/Placeholder-video.mp4"
                                type="video/webm" />
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                    video</a>
                            </p>
                        </video>
                    </div>
                </div>
                <p class="text-left pt-3">
                Transplant recipients are at greater risk of cancer and experience worse cancer outcomes than the general population - can GPs help?
                </p>
                <!-- Audio PLayer -->
                <div class="audio-player-block">
                    <figure>
                        <!-- <figcaption>Listen to the audio file</figcaption> -->
                        <audio class="custom-player" controls style="min-width: 100%" width="100%"
                            src="https://arterialeducation.s3.ap-southeast-2.amazonaws.com/placeholder-audio.mp3">
                            Your browser does not support the
                            <code>audio</code> element.
                        </audio>
                    </figure>
                </div>
                <!-- Audio PLayer -->

                <div class="d-flex justify-content-between bd-highlight py-3">
                    <a class="img-link" href="<?= url('storage/audio/') ?>file.mp3.pdf" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-download.png') ?>" /></div>
                            <div class="action-label">Podcast</div>
                        </div>
                    </a>
                    <div class="v-line"></div>
                    <a class="img-link" href="<?= url('storage/video/') ?>file.mp4" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-download.png') ?>" /></div>
                            <div class="action-label">Vodcast</div>
                        </div>
                    </a>
                    <div class="v-line"></div>
                    <a class="img-link" href="mailto:info@arterial-test.com" title="Podcast" target="_blank">
                        <div class="d-flex align-items-center">
                            <div class="action-ico"><img src="<?= theme('/assets/img/ico-share.png') ?>" /></div>
                            <div class="action-label">Share</div>
                        </div>
                    </a>
                </div>
            </div><!-- .col-lg-4 -->
        </div><!-- .row -->
    </div><!-- .page1-content -->
    
</div><!-- .container-fluid -->
