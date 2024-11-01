using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class UpdateDbModelDltSbarCondMasterModel : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "SBARCONDITION",
                table: "MST_GCM");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "SBARCONDITION",
                table: "MST_GCM",
                type: "text",
                nullable: false,
                defaultValue: "");
        }
    }
}
