---
layout: page
title: Members
---

<div class="govuk-grid-row">
  {%- for member in collections.members_sorted -%}
    <div class="member-summary govuk-grid-column-one-third">
      <a class="member-image-link" href="{{member.url}}"><img src="/images/{{member.data.image or "member-PLACEHOLDER.png"}}" /></a>
      <h2 class="govuk-heading-m govuk-!-margin-top-4 govuk-!-margin-bottom-2"><a href="{{member.url}}">{{ member.data.title }}</a></h2>
      <h3 class="govuk-heading-s">{{ member.data.role }},<br/>{{member.data.company}}</h3>
      <p class="govuk-!-margin-bottom-1">{{ member.data.summary }}</p>
      <p><a class="govuk-link" href="{{member.url}}">... read more <span class="govuk-visually-hidden">about {{member.data.title}}</span></a></p>
    </div>
  {%- endfor -%}
</div>
