
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

variable "aws_region" {
  type = string
  description = "The AWS region used for the provider and resources."
  default = "eu-west-2"
}
