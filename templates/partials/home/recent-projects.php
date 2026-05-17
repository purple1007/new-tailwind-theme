<section class="case_notes home__section" aria-labelledby="case-notes-title">
  <h2 id="case-notes-title">Case Notes</h2>

  <div class="case_notes__panel">
    <div class="case_notes__content">
      <?php if ( is_active_sidebar( 'case_notes_widget' ) ) : ?>
        <?php dynamic_sidebar( 'case_notes_widget' ); ?>
      <?php else : ?>
        <div class="case_notes__description">
          <p>正在整理中。</p>
          <p>我正在把早期專案重新整理成更清楚的產品設計筆記，聚焦 SaaS workflow、跨職能協作與設計判斷。</p>
        </div>
      <?php endif; ?>
    </div>

    <ol class="case_notes__topics" aria-label="Case Notes topics">
      <li class="case_notes__topic">
        <div class="case_notes__topic-header">
          <h3>SaaS 工作流程</h3>
          <span>01</span>
        </div>
        <div class="case_notes__illustration">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/case-notes/workflow.svg' ); ?>" alt="SaaS 工作流程插圖">
        </div>
        <p>整理複雜的產品流程，將模糊需求轉成更清楚、可使用的體驗。</p>
      </li>
      <li class="case_notes__topic">
        <div class="case_notes__topic-header">
          <h3>跨職能協作</h3>
          <span>02</span>
        </div>
        <div class="case_notes__illustration">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/case-notes/collaboration.svg' ); ?>" alt="跨職能協作插圖">
        </div>
        <p>記錄與 PM、工程師及跨部門夥伴一起推進產品決策的過程。</p>
      </li>
      <li class="case_notes__topic">
        <div class="case_notes__topic-header">
          <h3>AI 設計流程</h3>
          <span>03</span>
        </div>
        <div class="case_notes__illustration">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/case-notes/ai-process.svg' ); ?>" alt="AI 設計流程插圖">
        </div>
        <p>探索 AI 輔助設計流程、原型實驗與工具使用方式的整理筆記。</p>
      </li>
    </ol>
  </div>
</section>
