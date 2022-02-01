<div class="project_preview">
  <?php if ( has_post_thumbnail()) : ?>
    <figure class="project_preview__thumbnail">
      <a 
        href="<?php the_permalink() ?>"
        title="<?php the_title_attribute(); ?>"
        data-event-category="ArchiveProject" 
        data-event-action="Click"
        data-event-label="<?php the_title(); ?>/Thumbnail"
      >
      <?php the_post_thumbnail(); ?>
      </a>
    </figure>
    <h2 class="project_preview__title">
      <a 
          href="<?php the_permalink() ?>"
          title="<?php the_title_attribute(); ?>"
          data-event-category="ArchiveProject" 
          data-event-action="Click"
          data-event-label="<?php the_title(); ?>/Title"
        >
        <?php the_title(); ?>
      </a>
    </h2>
  <?php endif; ?>
</div>