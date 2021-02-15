# Versioning
The TransferWise API is continuously evolving as we offer new features and coverage to our API customers.
Here we explain how our API versioning is maintained so you know what to expect.

It's important to us that third-party integrations are not adversely affected by changes and we endeaver to uphold these standards
as part of making convenience and transparency part of our company's mission. We are regularly reviewing our policies to make sure we're 
delivering the best possible API developer experience.

These policies apply to both our REST API and our webhooks (push-based event API). 

## Breaking changes
A breaking change refers to any change that would require a client to update their application in order to continue working with the API 
as originally intended. If an API field or resource is removed or renamed, then a breaking change has taken place. In this case we will 
increment the version of the affected API endpoints to prevent breaking existing customer integrations. 

Under our current policy API endpoints are all not versioned together, if API endpoint compatibility has changed in the new version as a 
result of a breaking change we will provide clear instructions in our documentation on which API calls must be used together.

## Continuity (non-breaking) changes
TransferWise reserves the right to make additive changes to our API without incrementing the version number or notifying clients. 
We may add new resources, fields, and relationships to an existing version of the API and these will not be considered breaking changes. 

For example, if we add a new relationship to the Transfer resource for a “parent_order”, we will neither bump the API version nor 
notify our customers before releasing the update. We will, however, update our API documentation explaining the purpose of the changes.

**As such, clients should design their applications to be flexible enough to not break when new fields are added to resources.**

## Removal of existing API endpoints
It is not standard policy for TransferWise to remove or disable API versions, and we will not take this action lightly. However in some 
cases it may be necessary; for example if the affected API does not meet new regulatory requirements and there is no alternative to 
making a breaking change and disabling an old API. 

In the extremely rare case that this is necessary we will not remove API endpoints without notice to clients who may be affected, 
and formal warning of at least 6 months as long as this complies with our regulatory obligations.
