
variable "service_name" {
  type = string
  description = "The short name of the service."
  default = "wbc_website"
}

variable "service_name_hyphens" {
  type = string
  description = "The short name of the service (using hyphen-style)."
  default = "wbc-website"
}

variable "environment" {
  type = string
  description = "The environment name."
}

variable "environment_hyphens" {
  type = string
  description = "The environment name (using hyphen-style)."
}

variable "create_dns_record" {
  type = bool
  description = "Should terraform create a Route53 alias record for the (sub)domain"
}
variable "dns_record_subdomain_including_dot" {
  type = string
  description = "The subdomain (including dot - e.g. 'dev.' or just '' for production) for the Route53 alias record"
}

variable "create_redirect_from_root_domain" {
  type = bool
  description = "Should terraform create a CloudFront distribution to redirect the root domain to www."
}
variable "dns_record_root_domain_including_dot" {
  type = string
  description = "The root domain (including dot - e.g. 'dev.' or just '' for production) for the root domain redirect"
}

variable "prevent_email_spoofing" {
  type = bool
  description = "Should terraform create DNS records to prevent email spoofing (only required for the prod environment)"
  default = false
}


// SECRETS
// These variables are set in GitHub Actions environment-specific secrets
// Most of these are passed to the application via Elastic Beanstalk environment variables
variable "BASIC_AUTH_USERNAME" {
  type = string
  default = ""
  sensitive = true
}
variable "BASIC_AUTH_PASSWORD" {
  type = string
  default = ""
  sensitive = true
}
