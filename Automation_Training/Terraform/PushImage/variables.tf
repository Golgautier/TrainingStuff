variable "nutanix_username" {
    default = "admin"
    type = string
    description = "User name pour la connexion au PC"
}

variable "nutanix_password" {
    type = string
    description = "Password pour le user nutanix sur le PC"
    sensitive = true
}

variable "nutanix_endpoint" {
    type = string
    description = "IP ou FQDN du PC"
}

variable "nutanix_port" {
    default = "9440"
    type = number
    description = "Port de communication pour le PC"
  
}