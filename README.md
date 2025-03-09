# Clicksight

Data visualization platform with the following features:

* Workspace-level isolation from users
* Create Tables - map 1:1 to PostgreSQL tables in a workspace-specific data schema
  * Some extra logic like: Formatting, what columns are allowed as filters etc
* Update Tables with API calls to insert, append, overwrite, replace, etc
* Build Dashboards, each with Charts.
  * Some extra logic: toggles to enable/disable filtering, exporting, etc
  * Apply branding defaults from the workspace level or override them (set of chart colors you can manually hex)
* Each Chart pulls data from a Table for visualization, through a caching layer (by filter states) that all invalidated when the Table changes

"Killer" features are:

* Share a Dashboard out with a time-bound, passworded link that grants access to everything on that Dashboard
  * These are published to clicksight.cloud as static data?
* Invite users into your Workspace to see all the dashboards there.
* Request new visualization types in a leaderboard.

Pricing limits?

Free account: Create 1 workspace, 1 table sized up to 50mb, 1 dashboard with unlimited charts. Unlimited link sharing/traffic, unlimited expiration.


# Server setup:
