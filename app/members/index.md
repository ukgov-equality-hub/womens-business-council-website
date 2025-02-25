---
layout: page
title: Members
---

<div class="govuk-grid-row">
  {%- for member in collections.member -%}
    <div class="member-summary govuk-grid-column-one-third">
      <a href="{{member.url}}"><img src="/images/{{member.data.image or "member-PLACEHOLDER.png"}}" /></a>
      <a href="{{member.url}}"><h2 class="govuk-heading-m govuk-!-margin-top-4 govuk-!-margin-bottom-2">{{ member.data.title }}</h2></a>
      <h3 class="govuk-heading-s">{{ member.data.role }},<br/>{{member.data.company}}</h3>
      <p class="govuk-!-margin-bottom-1">{{ member.data.summary }}</p>
      <p><a class="govuk-link" href="{{member.url}}">... read more</a></p>
    </div>
  {%- endfor -%}
</div>
