
/////////////////////////////////////////////////
// The HTTPS certificate for the main website

resource "aws_acm_certificate" "https_certificate__main_domain" {
  // This certificate is for use by CloudFront, so it has to be created in the us-east-1 region (for some reason!)
  provider = aws.us-east-1

  domain_name = "${var.dns_record_subdomain_including_dot}${data.aws_route53_zone.route_53_zone_for_our_domain.name}"
  validation_method = "DNS"
}

resource "aws_route53_record" "dns_records_for_https_certificate_verification" {
  for_each = {
    for dvo in aws_acm_certificate.https_certificate__main_domain.domain_validation_options : dvo.domain_name => {
      name   = dvo.resource_record_name
      record = dvo.resource_record_value
      type   = dvo.resource_record_type
    }
  }

  allow_overwrite = true
  name            = each.value.name
  records         = [each.value.record]
  ttl             = 60
  type            = each.value.type
  zone_id         = data.aws_route53_zone.route_53_zone_for_our_domain.zone_id
}

resource "aws_acm_certificate_validation" "certificate_validation_waiter" {
  // This certificate is for use by CloudFront, so it has to be created in the us-east-1 region (for some reason!)
  provider = aws.us-east-1

  certificate_arn = aws_acm_certificate.https_certificate__main_domain.arn
  validation_record_fqdns = [for record in aws_route53_record.dns_records_for_https_certificate_verification : record.fqdn]
}


///////////////////////////////////////////////////////////////////
// The HTTPS certificate for the static site root domain redirect

resource "aws_acm_certificate" "https_certificate__root_domain_redirect" {
  count = (var.create_redirect_from_root_domain) ? 1 : 0  // Only create this HTTPS Certificate if "var.create_redirect_from_root_domain" is true

  // This certificate is for use by CloudFront, so it has to be created in the us-east-1 region (for some reason!)
  provider = aws.us-east-1

  domain_name = "${var.dns_record_root_domain_including_dot}${data.aws_route53_zone.route_53_zone_for_our_domain.name}"
  validation_method = "DNS"
}

resource "aws_route53_record" "dns_records_for_https_certificate_verification__root_domain_redirect" {
  for_each = {
    for dvo in aws_acm_certificate.https_certificate__root_domain_redirect[0].domain_validation_options : dvo.domain_name => {
      name   = dvo.resource_record_name
      record = dvo.resource_record_value
      type   = dvo.resource_record_type
    }
  }

  allow_overwrite = true
  name            = each.value.name
  records         = [each.value.record]
  ttl             = 60
  type            = each.value.type
  zone_id         = data.aws_route53_zone.route_53_zone_for_our_domain.zone_id
}

resource "aws_acm_certificate_validation" "certificate_validation_waiter__root_domain_redirect" {
  count = (var.create_redirect_from_root_domain) ? 1 : 0  // Only create this HTTPS Certificate if "var.create_redirect_from_root_domain" is true

  // This certificate is for use by CloudFront, so it has to be created in the us-east-1 region (for some reason!)
  provider = aws.us-east-1

  certificate_arn = aws_acm_certificate.https_certificate__root_domain_redirect[0].arn
  validation_record_fqdns = [for record in aws_route53_record.dns_records_for_https_certificate_verification__root_domain_redirect : record.fqdn]
}
