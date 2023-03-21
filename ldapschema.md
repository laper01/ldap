Secure LDAP schema
Supported editions for this feature: Business Plus; Enterprise; Education Fundamentals, Education Standard, Teaching and Learning Upgrade, and Education Plus.  Compare your edition

The Secure LDAP service makes the Google Cloud Directory objects available to LDAP clients using the hierarchy and attributes described in the sections below.

Sample hierarchy
<root>
cn=subschema

dc=example,dc=com
ou=Users
ou=Sales
uid=lisasmith
uid=jimsmith
ou=Groups
cn=group1
cn=group2
Attributes
Root
Server metadata:

objectClass: top
supportedLdapVersion: 3
supportedSASLMechanism: EXTERNAL, PLAIN
supportedExtension: 1.3.6.1.4.1.1466.20037 (StartTLS)
subschemaSubentry: cn=subschema
​Subschema
A machine-readable definition of the LDAP server schema:

objectClass: top, subschema
objectClasses: descriptions of the supported object classes
attributeTypes: descriptions of the supported attribute types
matchingRules: descriptions of the supported matching rules
Domain
Domain that you used to enroll in Google Workspace or Cloud Identity Premium. It contains subdomains, users, groups, and organizational units.

objectClass: top, domain, dcObject
dc: the name of the domain component (ex: dc=google)
hasSubordinates: TRUE
​Organizational Unit
This is an organizational unit within the directory tree. The organizational unit may contain other organizational units and/or people within it. The organizational unit tree is the same as the organizational unit tree that you see in the Google Admin console.

objectClass: top, organizationalUnit
ou: the name of the organizational unit (ex: ou=Users)
description: the longer human-readable description of the organizational unit
hasSubordinates: TRUE
Person
A user in the domain. People appear under the organizational units that they belong to:

objectClass: top, person, organizationalPerson, inetOrgPerson, posixAccount
uid: The user’s username. The username portion of their email address.
googleUid: The same as the uid. This exists to unambiguously distinguish it from the posixUid.
posixUid: The user’s username or, if it is set, the user’s POSIX username.
cn: The “common name”. This contains two values: the user’s username and the user’s display name.
sn: The user’s surname.
givenName: The user’s given name.
displayName: The user’s display name (full name).
mail: The user’s email address.
memberOf: A list of the fully qualified names of groups to which this user belongs.
title: The user’s title.
employeeNumber: The user’s employee ID.
employeeType: The user’s role in the organization.
departmentNumber: The name of the user’s department. This is not necessarily a number.
physicalDeliveryOfficeName: The user’s location or address.
jpegPhoto: The user’s profile photo.
entryUuid: A universally unique stable identifier for this user.
objectSid: A universally unique identifier for this user, compatible with Windows security identifiers.
uidNumber: A POSIX UID number for the user. If a POSIX ID is set for the user, it will reflect that. If not, it will be a unique stable identifier.
gidNumber: A POSIX GID number for the user’s primary group. If a POSIX GID is set for the user, it will reflect that. If not, it will be the same as the user’s UID number.

Note: You won't be able to search a user by their uidNumber or gidNumber unless their posixAccounts attributes were set by an admin using the Admin SDK API.

homeDirectory: The user’s POSIX home directory. Defaults to “/home/<username>”.
loginShell: The user’s POSIX login shell. Defaults to “/bin/bash”.
gecos: GECOS (historical) attributes for the user.
hasSubordinates: FALSE
​Group
objectClass: top, groupOfNames, posixGroup
cn: The group’s domain-unique name.
displayName: The group’s human-readable display name.
description: A longer human-readable description of the group.
gidNumber: The POSIX GID number for the group. This is a stable unique ID, but the group cannot be efficiently looked up by it.
entryUuid: A universally unique stable identifier for this group.
objectSid: A universally unique identifier for this group, compatible with Windows security identifiers.
member: A list of fully qualified names of members of this group.
memberUid: A list of usernames of members of this group.
googleAdminCreated: True if this group was created by an administrator.
hasSubordinates: FALSE
