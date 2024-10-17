using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class UpdateDbContextMSTSFT : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "SOFTWAREPERIOD",
                table: "TRN_DTL_SOFTWARE",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AddColumn<string>(
                name: "SBARCONDITION",
                table: "MST_GCM",
                type: "text",
                nullable: false,
                defaultValue: "");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "SOFTWAREPERIOD",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropColumn(
                name: "SBARCONDITION",
                table: "MST_GCM");
        }
    }
}
